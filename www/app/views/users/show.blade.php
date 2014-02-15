@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-male fa-fw "></i>
                Moradores
                <span>>
                Detalhes
                </span>
        </h1>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
        {{ Form::open(array('url' => 'moradores/' . $morador->id)) }}
        {{ Form::hidden('_method', 'DELETE') }}
        <button type="submit" href="" class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i> Apagar morador</button>
        {{ Form::close() }}
        <a class="btn btn-primary pull-right" href="{{ URL::to('moradores/' . $morador->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i> Editar morador</a>
    </div>
</div>

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
                        <span class="widget-icon"> <i class="fa fa-search-plus"></i> </span>
                        <h2>Morador</h2>
                    </header>
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
                </div>
        </article>
        {{-- end Widget --}}
    </div>
    {{-- end row --}}
</section>

@stop
