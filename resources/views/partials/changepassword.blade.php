<div class="panel-body">
    {!! Form::open(['data-remote-change-password','method'=>'post','url'=>'/settings/change-password/']) !!}

    <div class="group">
        {!! Form::password('old_password',['class' => 'form-postition form-control','placeholder' => 'Стара парола']) !!}
        <i data-show-error="old_password" class="fa fa-warning pop-warning"></i>
    </div>
    <br>
    <div class="group">
        {!! Form::password('password',['class' => 'form-postition form-control','placeholder' => 'Нова парола']) !!}
        <i data-show-error="password" class="fa fa-warning pop-warning"></i>
    </div>
    <br>
    <div class="group">
        {!! Form::password('password_confirmation',['class' => 'form-postition form-control','placeholder' => 'Потвърди парола']) !!}
    </div>
    <br>
    <button id="change-password" type="submit" class="btn btn-default btn-sm btn-pos">Смени</button>
    {!! Form::close() !!}
</div>