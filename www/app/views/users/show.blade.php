@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.show.top', array('icon' => 'fa-user','controller_name' => 'Usuário', 'model' => $user, 'delete_route' => 'users'))

    <table id="dt_basic" class="table table-striped table-hover">
        <tbody>
        <tr>
            <td>Apelido</td><td>{{ $user->first_name }}</td>
        </tr>
        <tr>
            <td>E-mail</td><td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td>Permissões</td><td>{{ $user->permissions }}</td>
        </tr>
        <tr>
            <td>Último login</td><td>{{ $user->last_login }}</td>
        </tr>
        </tbody>
    </table>

@include('layouts.show.bottom')

@stop
