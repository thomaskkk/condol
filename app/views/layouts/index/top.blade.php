<div id="main" role="main">
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa {{ $icon }} fa-fw "></i>
                    {{ $controller_name }}
                    <span>>
                    Listar
                    </span>
                </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <a class="btn btn-primary pull-right" href="{{ URL::to($create_route.'/create') }}"><i class="fa fa-plus-square"></i> Adicionar {{ $single_controller_name }}</a>
            </div>
        </div>

        {{-- Messages --}}
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <section id="widget-grid" class="">
            {{-- start row --}}
            <div class="row">
                {{-- start Widget --}}
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {{-- Widget ID (each widget will need unique ID) --}}
                    <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2>Lista de {{ $controller_name }}</h2>
                            </header>
                            <div>
                                {{-- widget edit box --}}
                                <div class="jarviswidget-editbox">
                                    {{-- This area used as dropdown edit box --}}
                                </div>
                                {{-- end widget edit box --}}
                                {{-- widget content --}}
                                <div class="widget-body no-padding">
                                    <div class="widget-body-toolbar">
                                    </div>