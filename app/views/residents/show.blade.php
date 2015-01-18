@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.show.top', array('icon' => 'fa-male', 'controller_name' => 'Morador', 'model' => $resident, 'delete_route' => 'residents'))

    <table id="dt_basic" class="table table-striped table-hover">
        <tbody>
        <tr>
            <td>Nome</td><td>{{ $resident->name }}</td>
        </tr>
        <tr>
            <td>E-mail</td><td>{{ $resident->email }}</td>
        </tr>
        <tr>
            <td>Cpf</td><td>{{ $resident->cpf }}</td>
        </tr>
        <tr>
            <td>Rg</td><td>{{ $resident->rg }}</td>
        </tr>
        <tr>
            <td>Telefone de contato</td><td>{{ $resident->contact_phone }}</td>
        </tr>
        <tr>
            <td>Data de nascimento</td><td>{{ $resident->birthdate }}</td>
        </tr>
        <tr>
            <td>Sexo</td><td>{{ $resident->gender }}</td>
        </tr>
        </tbody>
    </table>

@include('layouts.show.bottom')

@stop
