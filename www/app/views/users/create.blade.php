@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.create.top', array('errors' => $errors, 'icon' => 'fa-user', 'controler_name' => 'Usuários', 'submit_route' => 'users'))

    <fieldset>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <i class="icon-prepend fa fa-user"></i>
                    {{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'Apelido')) }}
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
                    <i class="icon-prepend fa fa-lock"></i>
                    {{ Form::password('password', array('id' => 'password', 'placeholder' => 'Digite a senha')) }}
                </label>
            </section>
            <section class="col col-6">
                <label class="input">
                    <i class="icon-prepend fa fa-lock"></i>
                    {{ Form::password('password_match', array('placeholder' => 'Re-digite a senha')) }}
                </label>
            </section>
        </div>
        <div class="row">
            <section class="col col-6">
                <label class="select select-multiple">
                    {{ Form::select('group[]', $groups, Input::old('group[]'), array('multiple', 'class' => 'custom-scroll')) }}
                </label>
            </section>
            <section class="col col-6">
                <label class="textarea textarea-resizable">
                    <i class="icon-append fa fa-question-circle"></i>
                    {{ Form::textarea('permissions', Input::old('permissions'), array('placeholder' => 'Permissões')) }}
                    <b class="tooltip tooltip-top-right">
                        <i class="fa fa-warning txt-color-teal"></i>
                        Formato:<br>
                        {<br>
                        "user.create" : 1,<br>
                        "user.delete" : 0,<br>
                        "user.view" : 1,<br>
                        "user.update" : 0
                        }</b>
                </label>
            </section>
        </div>
    </fieldset>

@include('layouts.create.bottom', array('cancel_route'=>'users'))
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
                    first_name : {
                        required : true,
                        minlength : 3
                    },
                    email : {
                        email : true
                    },
                    password : {
                        required : true,
                        minlength : 6
                    },
                    password_match : {
                        required : true,
                        minlength : 6,
                        equalTo : '#password'
                    }
                },

                // Messages for form validation
                messages : {
                    first_name : {
                        required : 'Por favor, preencha o Nome',
                        minlength : 'Por favor, insira pelo menos 3 caracteres'
                    },
                    email : {
                        email : 'Por favor, coloque um E-mail válido'
                    },
                    password : {
                        required : 'Por favor, digite a senha',
                        minlength : 'Por favor, insira pelo menos 6 caracteres'
                    },
                    password_match : {
                        required : 'Por favor, redigite a senha',
                        equalTo : 'As senhas são diferentes',
                        minlength : 'Por favor, insira pelo menos 6 caracteres',
                        equalTo : 'As senhas não são iguais'
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