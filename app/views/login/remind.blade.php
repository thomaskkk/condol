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
                    {{ Form::open(array('url' => 'forgotpassword', 'id' => 'main-form', 'class' => 'smart-form client-form', 'novalidate' => 'novalidate')) }}
                    <header>
                        Recuperar senha
                    </header>
                    <fieldset>
                        <div>
                            <section>
                                <label class="input">
                                    <i class="icon-prepend fa fa-envelope"></i>
                                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'Digite seu E-mail')) }}
                                </label>
                            </section>
                        </div>
                    </fieldset>
                    <footer>
                        <button class="btn btn-primary" type="submit"></i> Recuperar senha</button>
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
                }
            },

            // Messages for form validation
            messages : {
                email : {
                    required : 'Por favor, coloque um E-mail válido',
                    email : 'Por favor, coloque um E-mail válido'
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