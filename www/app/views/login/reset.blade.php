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
            <strong>Erro!</strong> {{ $errors }}
        </div>
        @endif

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="well no-padding">
                    {{ Form::open(array('url' => 'password/reset', 'id' => 'main-form', 'class' => 'smart-form client-form', 'novalidate' => 'novalidate')) }}
                    <header>
                        Recriar senha
                    </header>
                    <fieldset>
                        <div>
                            <section>
                                <label class="input">
                                    <i class="icon-prepend fa fa-envelope"></i>
                                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'E-mail')) }}
                                    {{ Form::hidden('token', $token) }}
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
                                    {{ Form::password('password_confirmation', array('placeholder' => 'Re-digite a senha')) }}
                                </label>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Recriar</button>
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
                password : {
                    required : true,
                    minlength : 6
                },
                password_confirmation : {
                    required : true,
                    minlength : 6,
                    equalTo : '#password'
                }
            },

            // Messages for form validation
            messages : {
                password : {
                    required : 'Por favor, digite a senha',
                    minlength : 'Por favor, insira pelo menos 6 caracteres'
                },
                password_confirmation : {
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