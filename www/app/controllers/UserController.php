<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        // get all
        $users = User::all();

        // load the view and pass
        return View::make('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        $rules = array(
            'name' => 'required',
            'email' => 'email|unique:users,email|unique:moradores,email',
            'password' => 'required|min:6',
            'password_match' => 'required|min:6|same:password'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/create')
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
            Session::flash('message', 'Usuário criado com sucesso!');
            return Redirect::to('users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get
        $user = User::find($id);

        // show the view and pass
        return View::make('users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // get
        $user = User::find($id);

        // show the edit form and pass
        return View::make('users.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        $rules = array(
            'name' => 'required',
            'email' => 'email|unique:users,email,'.$id.'|unique:moradores,email,'.$id,
            'password' => 'required|min:6',
            'password_match' => 'required|min:6|same:password'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'), Input::except('password_match'));
        } else {
            // store
            $user = User::find($id);
            $user->name  = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            $user->save();

            // redirect
            Session::flash('message', 'Usuário alterado com sucesso!');
            return Redirect::to('users');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Usuário apagado com sucesso!');
        return Redirect::to('users');
    }

}