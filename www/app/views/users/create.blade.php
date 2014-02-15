@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-male fa-fw "></i>
                    Usuários
                    <span>>
                    Adicionar
                    </span>
            </h1>
        </div>
    </div>

    {{-- Messages --}}
    <!-- if there are creation errors, they will show here -->
    @if (count($errors) > 1)
    <div class="alert alert-danger fade in">
        <button class="close" data-dismiss="alert">
            ×
        </button>
        <i class="fa-fw fa fa-times"></i>
        <strong>Erro!</strong> {{ HTML::ul($errors->all()) }}
    </div>
    @endif


    <section id="widget-grid" class="">
        {{-- start row --}}
        <div class="row">
            {{-- start Widget --}}
            <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                {{-- Widget ID (each widget will need unique ID) --}}
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
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
                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                            <h2>
                                Adicionar Moradores
                            </h2>
                        </header>
                        <div>
                            {{-- widget edit box --}}
                            <div class="jarviswidget-editbox">
                                {{-- This area used as dropdown edit box --}}
                            </div>
                            {{-- end widget edit box --}}
                            {{-- widget content --}}
                            <div class="widget-body no-padding">
                                {{ Form::open(array('url' => 'moradores', 'id' => 'main-form', 'class' => 'smart-form', 'novalidate' => 'novalidate')) }}
                                {{-- <header></header> --}}
                                <fieldset>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="input">
                                                <i class="icon-prepend fa fa-user"></i>
                                                {{ Form::text('nome', Input::old('nome'), array('placeholder' => 'Nome Completo')) }}
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="input">
                                                <i class="icon-prepend fa fa-envelope"></i>
                                                {{ Form::text('email', Input::old('email'), array('placeholder' => 'E-mail')) }}
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-6">
                                            <label class="input">
                                                <i class="icon-append fa fa-question-circle"></i>
                                                {{ Form::text('cpf', Input::old('cpf'), array(
                                                    'placeholder' => 'CPF',
                                                    'class' => 'form-control',
                                                    'data-mask' => "999.999.999-99"
                                                )) }}
                                                <b class="tooltip tooltip-bottom-right">
                                                    <i class="fa fa-warning txt-color-teal"></i>
                                                    Formato: 999.999.999-99</b>
                                            </label>
                                        </section>
                                        <section class="col col-6">
                                            <label class="input">
                                                <i class="icon-append fa fa-question-circle"></i>
                                                {{ Form::text('rg', Input::old('rg'), array('placeholder' => 'RG')) }}
                                                <b class="tooltip tooltip-bottom-right">
                                                    <i class="fa fa-warning txt-color-teal"></i>
                                                    Somente números</b>
                                            </label>
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-4">
                                            <label class="input">
                                                <i class="icon-append fa fa-calendar"></i>
                                                {{ Form::text('aniversario', Input::old('aniversario'), array(
                                                    'placeholder' => 'Data de Nascimento',
                                                    'class' => 'form-control',
                                                    'data-dateformat' => 'dd/mm/yy',
                                                    'data-mask' => '99/99/9999',
                                                    'data-mask-placeholder' => '-'
                                                )) }}
                                                <b class="tooltip tooltip-bottom-right">
                                                    <i class="fa fa-warning txt-color-teal"></i>
                                                    Formato: 01/01/1900</b>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="select">
                                                {{ Form::select('sexo', array(
                                                    '' => 'Selecione o genero',
                                                    'M' => 'Masculino',
                                                    'F' => 'Feminino',
                                                )) }}
                                                <i></i>
                                            </label>
                                        </section>
                                        <section class="col col-4">
                                            <label class="input">
                                                <i class="icon-append fa fa-phone"></i>
                                                {{ Form::text('tel_contato', Input::old('tel_contato'), array(
                                                    'placeholder' => 'Tel. Contato',
                                                    'class' => 'form-control',
                                                    'data-mask' => '(99) 9999-9999?9'
                                                )) }}
                                                <b class="tooltip tooltip-bottom-right">
                                                    <i class="fa fa-warning txt-color-teal"></i>
                                                    Formato: (11) 9999-9999</b>
                                            </label>
                                        </section>
                                    </div>
                                </fieldset>
                                <footer>
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
                                    <a class="btn btn-default" href="{{ URL::to('moradores/') }}"><i class="fa fa-arrow-circle-o-left"></i> Cancelar</a>
                                </footer>
                                {{ Form::close() }}
                            </div>
                            {{-- end widget content --}}
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

    {{-- Forms JS --}}
    <script src="/js/forms/jquery-validate/jquery.validate.min.js"></script>
    <script src="/js/forms/masked-input/jquery.maskedinput.min.js"></script>
    <script src="/js/forms/select2/select2.min.js"></script>
    <script src="/js/forms/jquery-form/jquery-form.min.js"></script>

    {{-- Validation --}}
    <script type="text/javascript">

        // DO NOT REMOVE : GLOBAL FUNCTIONS!

        $(document).ready(function() {

            pageSetUp();

            var $checkoutForm = $('#main-form').validate({
                // Rules for form validation
                rules : {
                    nome : {
                        required : true
                    },
                    email : {
                        email : true
                    },
                    rg : {
                        digits : true
                    }

                },

                // Messages for form validation
                messages : {
                    nome : {
                        required : 'Por favor, preencha o Nome'
                    },
                    email : {
                        email : 'Por favor, coloque um E-mail válido'
                    },
                    rg : {
                        digits : 'Por favor, somente números'
                    }
                },

                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });

            var $registerForm = $("#smart-form-register").validate({

                // Rules for form validation
                rules : {
                    username : {
                        required : true
                    },
                    email : {
                        email : true
                    }
                },

                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        })

    </script>

@stop