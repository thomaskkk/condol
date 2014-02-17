<?php

class MoradorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

        // get all
        $moradores = Morador::all();

        // load the view and pass
        return View::make('moradores.index')
            ->with('moradores', $moradores);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // load the create form
        return View::make('moradores.create');
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
            'nome' => 'required',
            'email' => 'email|unique:users,email|unique:moradores,email',
            'cpf' => 'unique:moradores,cpf',
            'rg' => 'numeric|unique:moradores,rg',
            'aniversario' => 'dateformat:d/m/Y',
            'sexo' => 'in:M,F'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('moradores/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $morador = new Morador;
            $morador->nome  = Input::get('nome');
            $morador->email = Input::get('email');
            $morador->cpf = Input::get('cpf');
            $morador->rg = Input::get('rg');
            $morador->tel_contato = Input::get('tel_contato');
            $morador->aniversario = Input::get('aniversario');
            $morador->sexo = Input::get('sexo');
            $morador->save();

            // redirect
            Session::flash('message', 'Morador criado com sucesso!');
            return Redirect::to('moradores');
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
        $morador = Morador::find($id);

        // show the view and pass
        return View::make('moradores.show')
            ->with('morador', $morador);
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
        $morador = Morador::find($id);

        // show the edit form and pass
        return View::make('moradores.edit')
            ->with('morador', $morador);
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
            'nome' => 'required',
            'email' => 'email|unique:users,email,'.$id.'|unique:moradores,email,'.$id,
            'cpf' => 'unique:moradores,cpf,'.$id,
            'rg' => 'numeric|unique:moradores,rg,'.$id,
            'aniversario' => 'dateformat:d/m/Y',
            'sexo' => 'in:M,F'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('moradores/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $morador = Morador::find($id);
            $morador->nome  = Input::get('nome');
            $morador->email = Input::get('email');
            $morador->cpf = Input::get('cpf');
            $morador->rg = Input::get('rg');
            $morador->tel_contato = Input::get('tel_contato');
            $morador->aniversario =  Input::get('aniversario');
            $morador->sexo = Input::get('sexo');

            $morador->save();

            // redirect
            Session::flash('message', 'Morador alterado com sucesso!');
            return Redirect::to('moradores');
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
        $morador = Morador::find($id);
        $morador->delete();

        // redirect
        Session::flash('message', 'Morador apagado com sucesso!');
        return Redirect::to('moradores');
	}

}