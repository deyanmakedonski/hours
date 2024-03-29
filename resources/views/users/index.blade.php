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
                        <h3>{{ $finHours }}</h3>
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
                    <li><p><i class="icon icon-key m-r-xs"></i><a style="margin-right:70px;" class="change-password" href="javascript:void(0);">Смяна на парола</a></p></li>
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
                                <div class="panel-body change-password-html">

                                    <p>ИНСТРУКЦИЯ ЗА РАБОТА С ПРОГРАМА "РЕГИСТЪР ШИК 1А"</p>
                                    <p>ЦЕЛ:Тази програма има за цел да улесни работата на служителите в "СТУДИО ЗА КРАСОТА ШИК"</p>
                                    <p>ЗАДАЧИ :</p>
                                    <p>-резервация на определен, удобен за клиента час за извършване на услуга(услуги) от служители в "СТУДИО ЗА КРАСОТА ШИК"</p>
                                    <p>-корекция или изтриване на резервиран час по желание на клиента</p>
                                    <p>-отчитане на услугите извършвани от служителите в "СТУДИО ЗА КРАСОТА ШИК"</p>
                                    <p>-визуализиране на график на заетите часове за извършжане на услуги от служителите в "СТУДИО ЗА КРАСОТА ШИК"</p>
                                    <p>-</p>
                                    <p>СЪЗДАВАНЕ И ПОЛЗВАНЕ НА АКАУНТ</p>
                                    <p>Всеки служител в "СТУДИО ЗА КРАСОТА ШИК" получава собствен акаунт и парола за ползване на програмата.Всеки служител има различни права и може да ползва различни възможности на програмата.Акаунт и парола се получават от администратора на програмата,след което всеки служител може да си смени паролата за достъп.</p>
                                    <p>ВХОД</p>
                                    <p>След отваряне на линк&nbsp; ..........&nbsp; на дисплея се визуализира образ с поле за въвеждане на акаунт и парола.Всеки служител въвежда акаунт и паролата си и кликва върху бутон "ВХОД" Всеки служител е длъжен да ползва само своя акаунт.</p>
                                    <p>РАБОТА С ПРОГРАМАТА "РЕГИСТЪР ШИК 1А"</p>
                                    <p>След кликване върху бутон "ВХОД" на дисплея се визуализира :</p>
                                    <p>снимка</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>РАЗЧИТАНЕ НА РАБОТНИЯ&nbsp; ГРАФИК</p>
                                    <p>Работния график може да се разглежда във вариант за деня,за седмицата и за текущия месец.</p>
                                    <p>Клик върху бутон&nbsp; "ДЕН" визуализира на дисплея график със запазените часове и процедури за текущия ден.Може да се видят резервираните часове и процедури за всеки служител оцветени в различен цвят.Клик върху изображението за резервирания час визуализира:</p>
                                    <p>1 правоъгълник в бежов цвят с изписани в него:</p>
                                    <p>-име на изпълнителя</p>
                                    <p>-процедура</p>
                                    <p>-име на клиент</p>
                                    <p>-контакт с клиента.</p>
                                    <p>2.бутон за корекция на резервацията&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; снимка</p>
                                    <p>3 бутон за изтриване или потвърждаване на резервацията&nbsp;&nbsp; снимка</p>
                                    <p>Клик върху бутони стрелки&nbsp; снимки визуализира графици за различни дни назад или напред във времето.Дата&nbsp; ,месец и година са изписани в поле над графика.</p>
                                    <p>Клик върху бутона "ДНЕС" връща графика в текущия ден.</p>
                                    <p>&nbsp;</p>
                                    <p>&nbsp;</p>
                                    <p>Клик върху бутон&nbsp; "СЕДМИЦА" визуализира на дисплея график със запазените часове и процедури за текущата седмица.Може да се видят резервираните часове и процедури за всеки служител оцветени в различен цвят.Клик върху изображението за резервирания час визуализира:</p>
                                    <p>1 правоъгълник в бежов цвят с изписани в него:</p>
                                    <p>-име на изпълнителя</p>
                                    <p>-процедура</p>
                                    <p>-име на клиент</p>
                                    <p>-контакт с клиента.</p>
                                    <p>2.бутон за корекция на резервацията&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; снимка</p>
                                    <p>3 бутон за изтриване или потвърждаване на резервацията&nbsp;&nbsp; снимка.</p>
                                    <p>Клик върху бутони стрелки&nbsp; снимки визуализира графици за различни седмици назад или напред във времето.Начална&nbsp; и крайна дата на седмицата ,месец и година са изписани в поле над графика.</p>
                                    <p>Клик върху бутона "ДНЕС" връща&nbsp; графика в рекущата седмица.</p>
                                    <p>&nbsp;</p>
                                    <p>Клик върху бутон&nbsp; "МЕСЕЦ" визуализира на дисплея график със запазените часове и процедури за текущия месец.Може да се видят резервираните часове и процедури за всеки служител оцветени в различен цвят.Клик върху изображението за резервирания час визуализира:</p>
                                    <p>1 правоъгълник в бежов цвят с изписани в него:</p>
                                    <p>-име на изпълнителя</p>
                                    <p>-процедура</p>
                                    <p>-име на клиент</p>
                                    <p>-контакт с клиента.</p>
                                    <p>2.бутон за корекция на резервацията&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; снимка</p>
                                    <p>3 бутон за изтриване или потвърждаване на резервацията&nbsp;&nbsp; снимка.</p>
                                    <p>Клик върху бутони стрелки&nbsp; снимки визуализира графици за различни месеци назад или напред във времето.Месец и година са изписани в поле над графика.</p>
                                    <p>Клик върху бутона "ДНЕС" връща графика в текущия месец.</p>
                                    <p>РЕЗЕРВИРАНЕ НА ЧАС И ПРОЦЕДУРА&nbsp; ПРИ СЛУЖИТЕЛ&nbsp; В "СТУДИО ЗА КРАСОТА ШИК"</p>
                                    <p>Резервирането може да стане и в трите вида графици - дневен,седмичен и месечен.</p>
                                    <p>1 Резервиране на час за процедура в дневния график:</p>
                                    <p>Резервирането на час се извършва в следния ред:</p>
                                    <p>-кликване в реда показващ желания от клиента час</p>
                                    <p>-почвява се форма за попълване&nbsp;&nbsp;&nbsp; снимка</p>
                                    <p>-попълва се желаната процедура</p>
                                    <p>-попълва се името на&nbsp; изпъляващия процедурата служител</p>
                                    <p>-попълва се името на клиента</p>
                                    <p>-попълва&nbsp; се телефон за контакт с клиента</p>
                                    <p>-кликва се върху бутон избери</p>
                                    <p>В графика се появява правоъгълник показващ резервирания час и процедура и цвят определящ изпълняващия служител.</p>
                                    <p>&nbsp;</p>
                                    <p>1 Резервиране на час за процедура в седмичия график:</p>
                                    <p>Резервирането на час се извършва в следния ред:</p>
                                    <p>-кликване в реда показващ желания от клиента&nbsp; ден и час</p>
                                    <p>-почвява се форма за попълване&nbsp;&nbsp;&nbsp; снимка</p>
                                    <p>-попълва се желаната процедура</p>
                                    <p>-попълва се името на&nbsp; изпъляващия процедурата служител</p>
                                    <p>-попълва се името на клиента</p>
                                    <p>-попълва&nbsp; се телефон за контакт с клиента</p>
                                    <p>-кликва се върху бутон избери</p>
                                    <p>В графика се появява правоъгълник показващ резервирания час и процедура и цвят определящ изпълняващия служител.</p>
                                    <p>1 Резервиране на час за процедура в месечния график:</p>
                                    <p>Резервирането на час се извършва в следния ред:</p>
                                    <p>-кликва се върху желания от плиента ден</p>
                                    <p>-визуализира се дневен график за посочения ден</p>
                                    <p>-кликване в реда показващ желания от клиента час</p>
                                    <p>-почвява се форма за попълване&nbsp;&nbsp;&nbsp; снимка</p>
                                    <p>-попълва се желаната процедура</p>
                                    <p>-попълва се името на&nbsp; изпъляващия процедурата служител</p>
                                    <p>-попълва се името на клиента</p>
                                    <p>-попълва&nbsp; се телефон за контакт с клиента</p>
                                    <p>-кликва се върху бутон избери</p>
                                    <p>В графика се появява правоъгълник показващ резервирания час и процедура и цвят определящ изпълняващия служител.</p>
                                    <p>Не може да се резервира вече отминал час.Не може да се резервира един и същи час за един и същи служител.</p>



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
                        <p>TEST</p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            </div>
                        </div>
                        <p>TEST</p>
                        <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            </div>
                        </div>
                        <p>TEST</p>
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
        var users = {!! $users  !!};
    </script>
@endsection