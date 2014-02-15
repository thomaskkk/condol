@extends('layouts.base')

@section('content')
@include('layouts.show.top', array('controller_name' => 'Morador', 'model' => $morador, 'delete_route' => 'moradores'))

    <table id="dt_basic" class="table table-striped table-hover">
        <tbody>
        <tr>
            <td>Nome</td><td>{{ $morador->nome }}</td>
        </tr>
        <tr>
            <td>E-mail</td><td>{{ $morador->email }}</td>
        </tr>
        <tr>
            <td>Cpf</td><td>{{ $morador->cpf }}</td>
        </tr>
        <tr>
            <td>Rg</td><td>{{ $morador->rg }}</td>
        </tr>
        <tr>
            <td>Telefone de contato</td><td>{{ $morador->tel_contato }}</td>
        </tr>
        <tr>
            <td>Data de nascimento</td><td>{{ $morador->aniversario }}</td>
        </tr>
        <tr>
            <td>Sexo</td><td>{{ $morador->sexo }}</td>
        </tr>
        </tbody>
    </table>

@include('layouts.show.bottom')

@stop
