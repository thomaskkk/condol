@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.index.top', array('icon' => 'fa-male', 'controller_name' => 'Moradores', 'single_controller_name' => 'morador', 'create_route' => 'residents'))

    <table id="dt_basic" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Cpf</th>
            <th>Rg</th>
            <th>Telefone de contato</th>
            <th>Data de nascimento</th>
            <th>Sexo</th>
            <th class="no_sort">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($residents as $key => $value)
            <tr>
                <td><a href="{{ URL::to('residents/' . $value->id) }}">{{ $value->name }}</a></td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->cpf }}</td>
                <td>{{ $value->rg }}</td>
                <td>{{ $value->phone_contact }}</td>
                <td>{{ $value->birthdate }}</td>
                <td>{{ $value->gender }}</td>
                <td>
                    <a class="btn bg-color-greenLight txt-color-white btn-xs" href="{{ URL::to('residents/' . $value->id) }}" title="detalhes"><i class="fa fa-search-plus"></i></a>
                    <a class="btn bg-color-blue txt-color-white btn-xs" href="{{ URL::to('residents/' . $value->id . '/edit') }}" title="editar"><i class="fa fa-pencil-square-o"></i></a>
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