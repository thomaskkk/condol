@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-male fa-fw "></i>
                    Moradores
                    <span>>
                    Listar
                    </span>
            </h1>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
            <a class="btn btn-primary pull-right" href="{{ URL::to('moradores/create') }}"><i class="fa fa-plus-square"></i> Adicionar morador</a>
        </div>
    </div>

    {{-- Messages --}}
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <section id="widget-grid" class="">
        {{-- start row --}}
        <div class="row">
            {{-- start Widget --}}
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                {{-- Widget ID (each widget will need unique ID) --}}
                <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
                    {{-- widget options:
                    usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                        data-widget-colorbutton="false"
                        data-widget-editbutton="false"
                        data-widget-togglebutton="false"
                        data-widget-deletebutton="false"
                        data-widget-fullscreenbutton="false"
                        data-widget-custombutton="false"
                        data-widget-collapsed="true"
                        data-widget-sortable="false"--}}
                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Lista de Moradores</h2>
                        </header>
                        <div>
                            {{-- widget edit box --}}
                            <div class="jarviswidget-editbox">
                                {{-- This area used as dropdown edit box --}}
                            </div>
                            {{-- end widget edit box --}}
                            {{-- widget content --}}
                            <div class="widget-body no-padding">
                                <div class="widget-body-toolbar">
                                </div>
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
                            </div>
                        </div>
                    </div>
            </article>
            {{-- end Widget --}}
        </div>
        {{-- end row --}}
    </section>

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