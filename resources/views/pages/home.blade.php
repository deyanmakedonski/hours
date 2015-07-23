@extends('app')

@section('styles')
    <link  href={{ URL::asset('assets/plugins/fullcalendar/fullcalendar.min.css') }} rel="stylesheet" type="text/css"/>
    <link  href={{ URL::asset('assets/plugins/qtip/jquery.qtip.min.css') }} rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="page-breadcrumb">
        <ol class="breadcrumb container">
            <li><a href={{ URL::to('/') }}>Начало</a></li>
            <li><a href="javascript:void(0);">Календар</a></li>

        </ol>
    </div>
    {{--<div class="page-title">--}}
    {{--<div class="container">--}}
    {{--<h3>Календар</h3>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div id="main-wrapper" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-body">
                        @include('partials.admincalendar')
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src={{ URL::asset('assets/plugins/fullcalendar/lib/moment.min.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('assets/plugins/fullcalendar/lang-all.js  ') }}></script>
    <script type="text/javascript" src={{ URL::asset('assets/plugins/qtip/jquery.qtip.min.js') }}></script>
    <script>
        var services = JSON.parse('{!!json_encode($services) !!}');
    </script>
    <script type="text/javascript" src={{ URL::asset('assets/js/selectplugin.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('assets/js/admincalendar.js') }}></script>



@endsection