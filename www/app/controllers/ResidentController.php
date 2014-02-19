<?php

class ResidentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        // get all
        $residents = Resident::all();

        // load the view and pass
        return View::make('residents.index')
            ->with('residents', $residents);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // load the create form
        return View::make('residents.create');
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
            'email' => 'email|unique:users,email|unique:residents,email',
            'cpf' => 'unique:residents,cpf',
            'rg' => 'numeric|unique:residents,rg',
            'birthdate' => 'dateformat:d/m/Y',
            'gender' => 'in:M,F'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('residents/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $resident = new Resident;
            $resident->name  = Input::get('name');
            $resident->email = Input::get('email');
            $resident->cpf = Input::get('cpf');
            $resident->rg = Input::get('rg');
            $resident->contact_phone = Input::get('contact_phone');
            $resident->birthdate = Input::get('birthdate');
            $resident->gender = Input::get('gender');
            $resident->save();

            // redirect
            Session::flash('message', trans('messages.resident_created'));
            return Redirect::to('residents');
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
        $resident = Resident::find($id);

        // show the view and pass
        return View::make('residents.show')
            ->with('resident', $resident);
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
        $resident = Resident::find($id);

        // show the edit form and pass
        return View::make('residents.edit')
            ->with('resident', $resident);
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
            'email' => 'email|unique:users,email,'.$id.'|unique:residents,email,'.$id,
            'cpf' => 'unique:residents,cpf,'.$id,
            'rg' => 'numeric|unique:residents,rg,'.$id,
            'birthdate' => 'dateformat:d/m/Y',
            'gender' => 'in:M,F'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('residents/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $resident = Resident::find($id);
            $resident->name  = Input::get('name');
            $resident->email = Input::get('email');
            $resident->cpf = Input::get('cpf');
            $resident->rg = Input::get('rg');
            $resident->contact_phone = Input::get('contact_phone');
            $resident->birthdate =  Input::get('birthdate');
            $resident->gender = Input::get('gender');

            $resident->save();

            // redirect
            Session::flash('message', trans('messages.resident_updated'));
            return Redirect::to('residents');
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
        $resident = Resident::find($id);
        $resident->delete();

        // redirect
        Session::flash('message', trans('messages.resident_deleted'));
        return Redirect::to('residents');
	}

}