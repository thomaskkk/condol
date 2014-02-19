@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.edit.top', array('errors' => $errors, 'icon' => 'fa-building', 'controler_name' => 'Unidades', 'model' => $unit, 'submit_route' => 'units'))

    <fieldset>
        <div class="row">
            <section class="col col-6">
                <label class="input">
                    <i class="icon-prepend fa fa-user"></i>
                    {{ Form::text('name', null, array('placeholder' => 'Nome')) }}
                </label>
            </section>
            <section class="col col-4">
                <label class="select">
                    {{ Form::select('block', array(
                    '' => 'Selecione o bloco',
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                    )) }}
                    <i></i>
                </label>
            </section>
        </div>
    </fieldset>

@include('layouts.edit.bottom', array('cancel_route'=>'units'))
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
                    }

                },

                // Messages for form validation
                messages : {
                    name : {
                        required : 'Por favor, preencha o Nome'
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