@extends('layouts.base')

@section('content')
@include('layouts.index.top', array('controller_name' => 'Moradores'))

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
        @foreach($moradores as $key => $value)
            <tr>
                <td><a href="{{ URL::to('moradores/' . $value->id) }}">{{ $value->nome }}</a></td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->cpf }}</td>
                <td>{{ $value->rg }}</td>
                <td>{{ $value->tel_contato }}</td>
                <td>{{ $value->aniversario }}</td>
                <td>{{ $value->sexo }}</td>
                <td>
                    <a class="btn bg-color-greenLight txt-color-white btn-xs" href="{{ URL::to('moradores/' . $value->id) }}" title="detalhes"><i class="fa fa-search-plus"></i></a>
                    <a class="btn bg-color-blue txt-color-white btn-xs" href="{{ URL::to('moradores/' . $value->id . '/edit') }}" title="editar"><i class="fa fa-pencil-square-o"></i></a>
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