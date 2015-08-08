<!DOCTYPE html>
<html>
<head>

    <!-- Title -->
    <title>СТУДИО ШИК</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Dashboard Template"/>
    <meta name="keywords" content="admin,dashboard"/>
    <meta name="author" content="Steelcoders"/>

    @include('partials.css')


</head>
<body class="page-forgot">
<main class="page-content">
    <div class="page-inner">
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-3 center">
                    <div class="login-box">

                        <div  class="logo-name text-lg text-center">
                            <img src={{ URL::to('assets/images/logos/logoStudio.png') }} alt="icon" class="icon">
                        </div>

                        <p class="text-center m-t-md">Моля, въведете нова парола.</p>


                        {!! Form::open(['url' => ('/password/reset')]) !!}
                        <div class="form-group">
                            {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'Имейл','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password('password',['class' => 'form-control','placeholder' => 'Парола','required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::password('password_confirmation',['class' => 'form-control','placeholder' => 'Парола','required']) !!}
                        </div>
                        <input type="hidden" name="token" value="{{ $token }}">
                        <button type="submit" class="btn btn-success btn-block">Смени</button>
                        {!! Form::close() !!}

                        <br>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Ооопс!</strong> Имаше няколко проблеми с въведените данни!<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div><!-- Main Wrapper -->
    </div><!-- Page Inner -->
</main><!-- Page Content -->


<!-- Javascripts -->
@include('partials.js')
<script>
    $('[data-remote-changePassword]').submit(function(e){
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post(url,data).error(function(er){

        }).success(function(data){

            if (data.fail) {

                $('[data-show-error]').hide().popover('hide');

                $.each(data.errors, function (index, value) {

                    var popover = $('[data-show-error=' + index + ']').show().popover();
                    popover.attr('data-content', value);

                });

            } else {

                $('[data-show-error]').hide().popover('destroy');
                $('input[name="email"]').val('');
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "1000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["info"]("Изпратен е линк до чашата поща!");
                //console.log(data);

            }

        });
        e.preventDefault();
    });
</script>

</body>
</html>












