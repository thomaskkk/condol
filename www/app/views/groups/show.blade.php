@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.show.top', array('icon' => 'fa-group', 'controller_name' => 'Grupos', 'model' => $group, 'delete_route' => 'groups'))


    <table id="dt_basic" class="table table-striped table-hover">
        <tbody>
        <tr>
            <td>Nome</td><td>{{ $group->name }}</td>
        </tr>
        <tr>
            <td>Permissões</td><td>{{ $group->permissions }}</td>
        </tr>
        </tbody>
    </table>


@include('layouts.show.bottom')

@stop
