@extends('layouts.base')

@section('body_options')
id="login" class="animated fadeInDown"
@stop

@section('layouts')
<header id="header">
    <div id="logo-group">
        <span id="logo"> <img src="/img/logo.png" alt="SmartAdmin"> </span>
    </div>
</header>
@stop

@section('content')
<div id="main" role="main">
    <div id="content" class="container">

        {{-- Messages --}}
        @if (count($errors) >= 1)
        <div class="alert alert-danger fade in">
            <button class="close" data-dismiss="alert">
                ×
            </button>
            <i class="fa-fw fa fa-times"></i>
            <strong>Erro!</strong> {{ HTML::ul($errors->all()) }}
        </div>
        @endif

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="well no-padding">
                    {{ Form::open(array('url' => 'register', 'id' => 'main-form', 'class' => 'smart-form client-form', 'novalidate' => 'novalidate')) }}
                        <header>
                            Registrar
                        </header>
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
                        </fieldset>
                        <footer>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Registrar</button>
                            <a class="btn btn-default" href="{{ URL::to('/') }}"><i class="fa fa-arrow-circle-o-left"></i> Cancelar</a>
                        </footer>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascripts')
@parent

<script src="/js/forms/jquery-validate/jquery.validate.min.js"></script>


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
                    minlength : 4
                },
                password_match : {
                    required : true,
                    minlength : 4,
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
                    minlength : 'Por favor, insira pelo menos 4 caracteres'
                },
                password_match : {
                    required : 'Por favor, redigite a senha',
                    equalTo : 'As senhas são diferentes',
                    minlength : 'Por favor, insira pelo menos 4 caracteres',
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