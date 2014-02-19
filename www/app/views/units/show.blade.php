@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.show.top', array('icon' => 'fa-building', 'controller_name' => 'Unidade', 'model' => $unit, 'delete_route' => 'units'))

    <table id="dt_basic" class="table table-striped table-hover">
        <tbody>
        <tr>
            <td>Nome</td><td>{{ $unit->name }}</td>
        </tr>
        </tbody>
    </table>

@include('layouts.show.bottom')

@stop
