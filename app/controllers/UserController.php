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

        //get groups
        $groups = DB::table('groups')->lists('name', 'id');

        // load the create form
        return View::make('users.create')->with('groups', $groups);
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
            'first_name' => 'required',
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
            $user_array = array(
                'first_name' => Input::get('first_name'),
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'activated' => true,
            );
            if(is_array(Input::get('permissions'))) {
                $user_array['permissions'] = json_decode(Input::get('permissions'), true);
            }

            $user = Sentry::createUser($user_array);
            foreach ( Input::get('group') as $value) {
                $adminGroup = Sentry::findGroupById($value);
                $user->addGroup($adminGroup);
            }

            // redirect
            Session::flash('message', trans('messages.user_created'));
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
        $user = Sentry::findUserByID($id);
        $groups = $user->getGroups();


        // show the view and pass
        return View::make('users.show')
            ->with('user', $user)
            ->with('groups', $groups);
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
        //get groups
        $groups = DB::table('groups')->lists('name', 'id');
        $user_groups = Sentry::findUserByID($id)->getGroups();

        // show the edit form and pass
        return View::make('users.edit')
            ->with('user', $user)
            ->with('groups', $groups);
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
            $user = Sentry::findUserById($id);
            $user->name  = Input::get('name');
            $user->email = Input::get('email');
            $user->password = Input::get('password');

            $user->save();

            // redirect
            Session::flash('message', trans('messages.user_updated'));
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
        $user = Sentry::findUserById($id);
        $user->delete();

        // redirect
        Session::flash('message', trans('messages.user_deleted'));
        return Redirect::to('users');
    }

}