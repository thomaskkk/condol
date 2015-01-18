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
        Sentry::logout();
        return Redirect::to('/');
    }
    public function forbidden()
    {
        return View::make('login.forbidden');
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
            'first_name' => 'required',
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
            $user = Sentry::createUser(array(
                'first_name' => Input::get('first_name'),
                'email'     => Input::get('email'),
                'password'  => Input::get('password'),
                'activated' => true
            ));

            $group = Sentry::findGroupByName('Moradores');
            $user->addGroup($group);

            // redirect
            Session::flash('message',  trans('messages.user_created_login'));
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

            try
            {
                // Set login credentials
                $credentials = array(
                    'email'    => Input::get('email'),
                    'password' => Input::get('password')
                );
                $remember = (Input::get('remember') == 1 ? true : false);

                // Try to authenticate the user
                $user = Sentry::authenticate($credentials, $remember);
            }
            catch (Exception $e)
            {
                // block
                Session::flash('message', trans('messages.invalid_email_or_password'));
                return Redirect::to('login')->withInput(Input::except('password'));;
            }

            //go to destination
            return Redirect::intended(Session::get('target_path'));
            Session::forget('target_path');


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
        // validate
        $rules = array(
            'email' => 'exists:users,email'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('forgotpassword')
                ->withErrors($validator)
                ->withInput();
        } else {
            // send email
            $user = Sentry::findUserByLogin(Input::get('email'));
            $data['resetCode'] = $user->getResetPasswordCode();
            Mail::send('emails.auth.reminder', $data, function($m) use ($user)
            {
                $m->to($user->email, $user->first_name)->subject(trans('messages.email_subject_password_reminder'));
            });

            // redirect
            Session::flash('message', trans('messages.email_sent', array('email' => $user->email)));
            return Redirect::to('forgotpassword');
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
        // validate
        $rules = array(
            'email' => 'exists:users,email',
            'password' => 'required|min:4',
            'password_match' => 'required|min:4|same:password'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Redirect::back()
                ->withErrors($validator)
                ->withInput(Input::except('password'), Input::except('password_match'));
        } else {
            try
            {
                // Find the user using the user id
                $user = Sentry::findUserByLogin(Input::get('email'));

                // Check if the reset password code is valid
                if ($user->checkResetPasswordCode(Input::get('token')))
                {
                    // Attempt to reset the user password
                    if ($user->attemptResetPassword(Input::get('token'), Input::get('password')))
                    {
                        // Password reset passed
                        Session::flash('message', trans('messages.password_reset'));
                        return Redirect::to('login');
                    }
                    else
                    {
                        // Password reset failed
                        return Redirect::back()->with('errors', trans('messages.password_reset_fail'));
                    }
                }
                else
                {
                    // The provided password reset code is Invalid
                    return Redirect::back()->with('errors', trans('messages.resetcode_invalid'));
                }
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                return Redirect::back()->with('errors', trans('messages.user_not_found'));
            }
        }
    }
}