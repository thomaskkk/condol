@extends('layouts.base')

@section('layouts')
@include('layouts.header')
@include('layouts.leftpanel')
@stop

@section('content')
@include('layouts.edit.top', array('errors' => $errors, 'icon' => 'fa-group', 'controler_name' => 'Grupos', 'model' => $group, 'submit_route' => 'groups'))

    <fieldset>
        <div>
            <section>
                <label class="input">
                    <i class="icon-prepend fa fa-user"></i>
                    {{ Form::text('name', null, array('placeholder' => 'Nome')) }}
                </label>
            </section>
        </div>
        <div>
            <section>
                <label class="textarea textarea-resizable">
                    <i class="icon-append fa fa-question-circle"></i>
                    {{ Form::textarea('permissions', null, array('placeholder' => 'Permissões')) }}
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

@include('layouts.edit.bottom', array('cancel_route'=>'groups'))
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
                        required : true,
                        minlength : 3
                    },
                    permissions : {
                        required : true,
                        minlength : 3
                    }
                },

                // Messages for form validation
                messages : {
                    name : {
                        required : 'Por favor, preencha o Nome',
                        minlength : 'Por favor, insira pelo menos 3 caracteres'
                    },
                    permissions : {
                        required : 'Por favor, digite as permissões',
                        minlength : 'Por favor, insira pelo menos 3 caracteres'
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
