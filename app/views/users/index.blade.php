@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.index.top', array('icon' => 'fa-user', 'controller_name' => 'Usuários', 'single_controller_name' => 'usuário', 'create_route' => 'users'))

    <table id="dt_basic" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Apelido</th>
            <th>E-mail</th>
            <th>Permissões</th>
            <th>Último login</th>
            <th class="no_sort">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key => $value)
            <tr>
                <td><a href="{{ URL::to('users/' . $value->id) }}">{{ $value->first_name }}</a></td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->permissions }}</td>
                <td>{{ $value->last_login }}</td>
                <td>
                    <a class="btn bg-color-greenLight txt-color-white btn-xs" href="{{ URL::to('users/' . $value->id) }}" title="detalhes"><i class="fa fa-search-plus"></i></a>
                    <a class="btn bg-color-blue txt-color-white btn-xs" href="{{ URL::to('users/' . $value->id . '/edit') }}" title="editar"><i class="fa fa-pencil-square-o"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@include('layouts.index.bottom')
@stop

@section('javascripts')
@parent

    {{-- Datatables JS --}}
    <script src="/js/datatables/plugins/jquery.dataTables-cust.min.js"></script>
    <script src="/js/datatables/plugins/ColReorder.min.js"></script>
    <script src="/js/datatables/plugins/FixedColumns.min.js"></script>
    <script src="/js/datatables/plugins/ColVis.min.js"></script>
    <script src="/js/datatables/plugins/ZeroClipboard.js"></script>
    <script src="/js/datatables/plugins/TableTools.min.js"></script>
    <script src="/js/datatables/plugins/DT_bootstrap.js"></script>
    <script src="/js/datatables/datatables.js"></script>

@stop