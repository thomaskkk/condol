<?php

class UnitController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        // get all
        $units = Unit::all();

        // load the view and pass
        return View::make('units.index')
            ->with('units', $units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form
        return View::make('units.create');
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
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('units/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $unit = new Unit;
            $unit->name  = Input::get('name');
            $unit->block = Input::get('block');
            $unit->save();

            // redirect
            Session::flash('message', trans('messages.unit_created'));
            return Redirect::to('units');
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
        $unit = Unit::find($id);

        // show the view and pass
        return View::make('units.show')
            ->with('unit', $unit);
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
        $unit = Unit::find($id);

        // show the edit form and pass
        return View::make('units.edit')
            ->with('unit', $unit);
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
            'name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('units/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $unit = Unit::find($id);
            $unit->name  = Input::get('name');
            $unit->block = Input::get('block');
            $unit->save();

            // redirect
            Session::flash('message', trans('messages.unit_updated'));
            return Redirect::to('units');
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
        $unit = Unit::find($id);
        $unit->delete();

        // redirect
        Session::flash('message', trans('messages.unit_deleted'));
        return Redirect::to('units');
    }

}