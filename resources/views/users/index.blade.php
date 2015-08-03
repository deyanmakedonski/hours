@extends('app')

@section('styles')

    <link href={{ URL::to('assets/plugins/bootstrap-colorpicker/css/colorpicker.css') }} rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="profile-cover">
        <div class="container">
            <div class="col-md-12 profile-info">
                <div class="profile-info-value">
                    @if($resHours == 1)
                        <h3>{{ $resHours }}</h3>
                        <p>Запазен час</p>
                    @else
                        <h3>{{ $resHours }}</h3>
                        <p>Запазени часа</p>
                    @endif
                </div>
                <div class="profile-info-value">
                    @if($finHours == 1)
                        <h3>{{ $finHours }}$finHours</h3>
                        <p>Изпълнен час</p>
                    @else
                        <h3>{{$finHours}}</h3>
                        <p>Изпълнени часове</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div id="main-wrapper" class="container">
        <div class="row">
            <div class="col-md-3 user-profile">
                <div class="profile-image-container avatar-settings">
                    <img  src={{URL::to('/avatar/'.\Hashids::encode(Auth::user()->id,rand(0,100)))}} alt="">
                    <div id="change-avatar" class="change-avatar"><p>Смени аватар</p><i class="fa fa-camera"></i></div>
                </div>
                <h3 class="text-center">{{ Auth::user()->name }}</h3>
                <p class="text-center"></p>
                <hr>
                <ul class="list-unstyled text-center">
                    <li>
                        <label class="col-md-9">Цвят на запазени часове:</label>
                        <div class="col-md-1 input-group user-event-color">
                            {!! Form::text('event-color',\Auth::user()->eventcolor,['class' => 'form-postition form-control','placeholder' => 'Изберете цвят','autocomplete'=>'off','style'=>'display:none']) !!}
                            <span class="input-group-addon"><i></i></span>
                        </div>
                    </li>
                    <hr>
                    <li><p><i class="fa fa-map-marker m-r-xs"></i>София, ул.Ал Стамболийски №33</p></li>
                    <li><p><i class="fa fa-envelope m-r-xs"></i>{{ Auth::user()->email }}</p></li>
                    <li><p><i class="fa fa-link m-r-xs"></i><a href="/">www.hours.shik.bg</a></p></li>
                </ul>
                <hr>
            </div>
            <div class="col-md-6 m-t-lg">

                <div class="profile-timeline">
                    <ul class="list-unstyled">
                        <li class="timeline-item">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="timeline-item-header">
                                        <img src="assets/images/avatar3.png" alt="">
                                        <p>Christopher palmer <span>Posted a Status</span></p>
                                        <small>5 hours ago</small>
                                    </div>
                                    <div class="timeline-item-post">
                                        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula.</p>
                                        <div class="timeline-options">
                                            <a href="#"><i class="icon-like"></i> Like (7)</a>
                                            <a href="#"><i class="icon-bubble"></i> Comment (2)</a>
                                            <a href="#"><i class="icon-share"></i> Share (3)</a>
                                        </div>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                <img src="assets/images/avatar5.png" alt="">
                                                <p>Nick Doe <small>1 hour ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo.</p>
                                        </div>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                <img src="assets/images/avatar2.png" alt="">
                                                <p>Sandra Smith <small>3 hours ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                        </div>
                                        <textarea class="form-control" placeholder="Replay"></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-3 m-t-lg">
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <div class="panel-title">Колеги</div>
                    </div>
                    <div class="panel-body">
                        <div class="team">
                            @foreach($users as $key=>$user)
                            <div data-key={{$key}} class="team-avatar">
                                <img src={{URL::to('/avatar/'.\Hashids::encode($user->id,rand(0,100)))}} alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <div class="panel-title">ИНФОРМАЦИЯ</div>
                    </div>
                    <div class="panel-body">
                        <p>Това е тестова версия. Сайтът е предназначен за служителите на СТУДИО ШИК. Предназначенa е за запазвване на часове.</p>
                    </div>
                </div>
                <div class="panel panel-white">
                    <div class="panel-heading">
                        <div class="panel-title">Умения</div>
                    </div>
                    <div class="panel-body">
                        <p>HTML5</p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            </div>
                        </div>
                        <p>PHP</p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            </div>
                        </div>
                        <p>Javascript</p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ URL::to('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/plupload-2.1.7/js/plupload.full.min.js') }}"></script>
    <script type="text/javascript" src={{ URL::asset('assets/js/usersettings.js') }}></script>
    <script>
        var users = {!! $users !!};
    </script>
@endsection