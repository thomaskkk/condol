<div class="row">
    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
        <h1 class="page-title txt-color-blueDark">
            <i class="fa fa-male fa-fw "></i>
            {{ $controler_name }}
            <span>>
            Adicionar
            </span>
        </h1>
    </div>
</div>

{{-- Messages --}}
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
                <header>
                    <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                    <h2>Adicionar {{ $controler_name }}</h2>
                </header>
                <div>
                    {{-- widget edit box --}}
                    <div class="jarviswidget-editbox">
                        {{-- This area used as dropdown edit box --}}
                    </div>
                    {{-- end widget edit box --}}
                    {{-- widget content --}}
                    <div class="widget-body no-padding">
                        {{ Form::open(array('url' => $submit_route, 'id' => 'main-form', 'class' => 'smart-form', 'novalidate' => 'novalidate')) }}