<?php

class GroupController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        // get all
        $groups = Group::all();

        // load the view and pass
        return View::make('groups.index')
            ->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form
        return View::make('groups.create');
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
            'name' => 'required|unique:groups,name',
            'permissions' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('groups/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $group = Sentry::createGroup(array(
                'name' => Input::get('name'),
                'permissions' => json_decode(Input::get('permissions'), true)
            ));

            // redirect
            Session::flash('message', trans('messages.group_created'));
            return Redirect::to('groups');
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
        $group = Group::find($id);

        // show the view and pass
        return View::make('groups.show')
            ->with('group', $group);
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
        $group = Group::find($id);

        // show the edit form and pass
        return View::make('groups.edit')
            ->with('group', $group);
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
            'name' => 'required|unique:groups,name,'.$id,
            'permissions' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('groups/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $group = Sentry::findGroupById($id);
            $group->name = Input::get('name');
            $group->permissions = json_decode(Input::get('permissions'), true);
            $group->save();

            // redirect
            Session::flash('message', trans('messages.group_updated'));
            return Redirect::to('groups');
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
        $group = Sentry::findGroupById($id);
        $group->delete();

        // redirect
        Session::flash('message', trans('messages.group_deleted'));
        return Redirect::to('groups');
    }
}
