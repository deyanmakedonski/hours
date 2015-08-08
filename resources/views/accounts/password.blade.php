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
                        <p class="text-center m-t-md">Моля въведете имейл!</p>
                        {!! Form::open(['data-remote-changePassword','method'=>'post','url'=>'/password/email/','class'=>'m-t-md']) !!}
                            <div class="form-group">
                                {!! Form::text('email',null,['class' => 'form-control','placeholder' => 'Имейл','autocomplete'=>'off']) !!}
                                <i data-show-error="email" class="fa fa-warning pop-warning"></i>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Потвърди</button>
                            <a href="{{ URL::to('/') }}" class="btn btn-default btn-block m-t-md">Назад</a>
                        {!! Form::close() !!}
                        <p class="text-center m-t-xs text-sm">2015 Created by Alexander Makedonski.</p>
                    </div>
                </div>
            </div><!-- Row -->
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

