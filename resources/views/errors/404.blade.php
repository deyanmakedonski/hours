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
<body class="page-error">
<main class="page-content">
    <div class="page-inner">
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-4 center">
                    <h1 class="text-xxl text-primary text-center">404</h1>

                    <div class="details">
                        <h3>Страницата не съществува!!!</h3>

                        <p>Тази странице не съществува. Върнете се на  <a href={{URL::to('home')}}>Начална страница</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Row -->
        </div>
        <!-- Main Wrapper -->
    </div>
    <!-- Page Inner -->
</main>
<!-- Page Content -->

@include('partials.js')

</body>
</html>