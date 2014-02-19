@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.create.top', array('errors' => $errors, 'icon' => 'fa-male', 'controler_name' => 'Moradores', 'submit_route' => 'residents'))

{{-- Messages --}}

    <fieldset>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <i class="icon-prepend fa fa-user"></i>
                    {{ Form::text('name', Input::old('name'), array('placeholder' => 'Nome Completo')) }}
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
                    {{ Form::text('birthdate', Input::old('birthdate'), array(
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
                    {{ Form::select('gender', array(
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
                    {{ Form::text('contact_phone', Input::old('contact_phone'), array(
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

@include('layouts.create.bottom', array('cancel_route'=>'residents'))
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
                    name : {
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
                    name : {
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
        })

    </script>

@stop