@extends('app')

@section('styles')
    <link  href={{ URL::asset('assets/plugins/fullcalendar/fullcalendar.min.css') }} rel="stylesheet" type="text/css"/>
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
            <div class="col-md-13">
                <div class="panel panel-white">
                    <div class="panel-body">
                        @if(Auth::user()->role->role_title == 'Admin' || Auth::user()->role->role_title == 'Moderator')
                            <div class="admin-cal-ajax">

                            </div>
                         @else

                            <div class="nop-cal-ajax">

                            </div>

                        @endif

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

    <script type="text/javascript" src={{ URL::asset('/assets/js/taphold.js') }}></script>

    @if(Auth::user()->role->role_title == 'Admin' || Auth::user()->role->role_title == 'Moderator')
        <script>
            var services = JSON.parse('{!!json_encode($services) !!}');
        </script>
        <script type="text/javascript" src={{ URL::asset('assets/js/admincalendar.js') }}></script>
        <script type="text/javascript" src={{ URL::asset('assets/js/selectplugin.js') }}></script>
    @else
        <script>
            var services = JSON.parse('{!!json_encode($servicesnp) !!}');
        </script>
        <script type="text/javascript" src={{ URL::asset('assets/js/nopcalendar.js') }}></script>
        <script type="text/javascript" src={{ URL::asset('assets/js/selectpluginnp.js') }}></script>

    @endif


@endsection