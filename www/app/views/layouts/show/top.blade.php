<div id="main" role="main">
    <div id="content">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-male fa-fw "></i>
                    {{ $controller_name }}
                    <span>>
                    Detalhes
                    </span>
                </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                {{ Form::open(array('url' => $delete_route.'/' . $morador->id)) }}
                {{ Form::hidden('_method', 'DELETE') }}
                <button type="submit" href="" class="btn btn-danger pull-right"><i class="fa fa-trash-o"></i> Apagar {{ $controller_name }}</button>
                {{ Form::close() }}
                <a class="btn btn-primary pull-right" href="{{ URL::to($delete_route.'/' . $model->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i> Editar {{ $controller_name }}</a>
            </div>
        </div>

        <section id="widget-grid" class="">
            {{-- start row --}}
            <div class="row">
                {{-- start Widget --}}
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {{-- Widget ID (each widget will need unique ID) --}}
                    <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Detalhes do {{ $controller_name }}</h2>
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