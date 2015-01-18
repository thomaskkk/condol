@extends('layouts.base')

@section('body_options')
id="login" class="animated fadeInDown"
@stop

@section('layouts')
    <header id="header">

        <div id="logo-group">
            <span id="logo"> <img src="/img/logo.png" alt="SmartAdmin"> </span>
        </div>

        <span id="login-header-space"> <span class="hidden-mobile">Precisa de uma conta?</span> <a href="{{ URL::to('register') }}" class="btn btn-danger">Criar conta</a> </span>

    </header>
@stop

@section('content')
<div id="main" role="main">
    <div id="content" class="container">
        <div class="row">

            {{-- Messages --}}
            @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
                <h1 class="txt-color-red login-header-big">Titulo</h1>
                <div class="hero">

                    <div class="pull-left login-desc-box-l">
                        <h4 class="paragraph-header">Descrição</h4>
                        <div class="login-app-icons">
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm">Botão1</a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm">Botão2</a>
                        </div>
                    </div>

                    <img src="/img/demo/iphoneview.png" class="pull-right display-image" alt="" style="width:210px">

                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">Sobre</h5>
                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa.
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h5 class="about-heading">Sobre2</h5>
                        <p>
                            Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi voluptatem accusantium!
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                <div class="well no-padding">
                    {{ Form::open(array('url' => 'login', 'id' => 'main-form', 'class' => 'smart-form client-form', 'novalidate' => 'novalidate')) }}
                        <header>
                            Entrar
                        </header>

                        <fieldset>

                            <section>
                                <label class="label">E-mail</label>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'E-mail')) }}
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Por favor, digite seu E-mail</b></label>
                            </section>

                            <section>
                                <label class="label">Senha</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    {{ Form::password('password', array('id' => 'password', 'placeholder' => 'Digite a senha')) }}
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Digite sua senha</b> </label>
                                <div class="note">
                                    <a href="{{ URL::to('forgotpassword') }}">Esqueceu sua senha?</a>
                                </div>
                            </section>

                            <section>
                                <label class="checkbox">
                                    {{ Form::checkbox('remember', '1', true) }}
                                    <i></i>Manter conectado</label>
                            </section>
                        </fieldset>
                        <footer>
                            <button type="submit" class="btn btn-primary">
                                Entrar
                            </button>
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
                    email : {
                        required : true,
                        email : true
                    },
                    password : {
                        required : true,
                        minlength : 4
                    }
                },

                // Messages for form validation
                messages : {
                    email : {
                        required : 'Por favor, preencha o E-mail',
                        email : 'Por favor, coloque um E-mail válido'
                    },
                    password : {
                        required : 'Por favor, digite a senha',
                        minlength : 'Por favor, insira pelo menos 4 caracteres'
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