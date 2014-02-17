<?php

class LoginController extends Controller {

    public function getLogin()
    {
        return View::make('login.login');
    }
    public function getRegister()
    {
        return View::make('login.register');
    }
    public function logoff()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postRegister()
    {
        // validate
        $rules = array(
            'name' => 'required',
            'email' => 'email|unique:users,email|unique:moradores,email',
            'password' => 'required|min:4',
            'password_match' => 'required|min:4|same:password'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('register')
                ->withErrors($validator)
                ->withInput(Input::except('password'), Input::except('password_match'));
        } else {
            // store
            $user = new User;
            $user->name  = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            $user->save();

            // redirect
            Session::flash('message', 'Usuário criado com sucesso! Realize o seu login no formulário abaixo.');
            return Redirect::to('login');
        }
    }

    /**
     * Check login info
     *
     * @return mixed
     */
    public function postLogin()
    {
        // validate
        $rules = array(
            'email' => 'required',
            'password' => 'required|min:4'
        );
        $validator = Validator::make(Input::all(), $rules);

        // back to page
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {

            $remember = (Input::get('remember') == 1 ? true : false);
            // process login
            if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), $remember))
            {
                //go to destination
                return Redirect::intended(Session::get('target_path'));
                Session::forget('target_path');
            }
            else {
                // block
                Session::flash('message', 'E-mail ou senha inválidos.');
                return Redirect::to('login');
            }


        }
    }
	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('login.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('email')))
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('errors', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('status', Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('login.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('errors', Lang::get($response));

			case Password::PASSWORD_RESET:
                Session::flash('message', 'Senha alterada! Realize o seu login no formulário abaixo.');
				return Redirect::to('login');
		}
	}

}