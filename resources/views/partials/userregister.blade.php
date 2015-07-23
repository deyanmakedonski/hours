<div class="row">
    <div class="col-md-6 registration-form">
        <div class="panel panel-white">
            <div class="panel-title">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Регистрация</h4>
                </div>
                <ul class="panel-tools">
                    <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                </ul>
            </div>
            <div class="panel-body account" style="display: none;">
                {!! Form::open(['data-remote-account','method'=>'post','url'=>'/account/register/']) !!}
                <div class="group">
                    <div id="avatar-upload"></div>
                </div>
                <div class="group">
                    <i class="fa-position fa fa-user"></i>
                    {!! Form::text('name',null,['class' => 'form-postition form-control','placeholder'=>'Име']) !!}
                    <i data-show-error="name" class="fa fa-warning pop-warning"></i>
                </div>
                <div class="group">
                    <i class="fa-position fa fa-envelope-o"></i>
                    {!! Form::text('email',null,['class' => 'form-postition form-control','placeholder' => 'Имейл','autocomplete'=>'off']) !!}
                    <i data-show-error="email" class="fa fa-warning pop-warning"></i>
                </div>
                <div class="group">
                    <i class="fa-position fa fa-key "></i>
                    {!! Form::password('password',['class' => 'form-postition form-control','placeholder' => 'Парола']) !!}
                    <i data-show-error="password" class="fa fa-warning pop-warning"></i>
                </div>

                <div class="group">
                    <i class="fa-position fa fa-key"></i>
                    {!! Form::password('password_confirmation',['class' => 'form-postition form-control','placeholder' =>
                    'Потвърди парола']) !!}
                </div>

                <div class="group">
                    <i class="fa-position glyphicon glyphicon-euro"></i>
                    {!! Form::text('salary',null,['class' => 'form-postition form-control','placeholder' => 'Заплата','autocomplete'=>'off']) !!}
                    <i data-show-error="salary" class="fa fa-warning pop-warning"></i>
                </div>
                <br>
                <div class="group">
                    <div class="bdate-select"></div>
                    <i data-show-error="date" class="fa fa-warning pop-warning"></i>
                </div>
                <br>
                <div class="group">
                    <select name="categories[]" class="user-register" multiple="multiple">
                        @foreach($root_categories as $root)
                            <optgroup label="{{ $root->name }}">
                                @foreach($categories as $category)
                                    @if($root->id == $category->parent_id)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-5">
                        <div class="group">
                            <select name="role"  class="form-control" >
                                @foreach($roles as $role)
                                    @if($role->role_title == 'Base')
                                        <option value="{{ $role->id }}" selected>{{ $role->role_title }}</option>
                                    @else
                                        <option value="{{ $role->id }}">{{ $role->role_title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <button id="start-upload" type="submit" class="btn btn-default btn-sm btn-pos">Регистрирай</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>