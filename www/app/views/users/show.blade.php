@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.show.top', array('controller_name' => 'Usuário', 'model' => $users, 'delete_route' => 'users'))

<div id="main" role="main">
    <div id="content">
        <table id="dt_basic" class="table table-striped table-hover">
            <tbody>
            <tr>
                <td>Nome</td><td>{{ $morador->name }}</td>
            </tr>
            <tr>
                <td>E-mail</td><td>{{ $morador->email }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

@include('layouts.show.bottom')

@stop
