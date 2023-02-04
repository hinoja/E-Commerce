
<!DOCTYPE html>
<html lang="en">


<head>
    <title>Mentor - Bootstrap 4 Admin Dashboard Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app style -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
    alpha/css/bootstrap.css"
        rel="stylesheet">

    <link rel="shortcut icon" href={{ asset('asset/img/favicon.ico') }}>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- app favicon -->
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href={{ asset('asset/css/style.css') }} />
    <link rel="stylesheet" type="text/css" href={{ asset('asset/css/vendors.css') }} />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    @livewireStyles()


</head>

<body>
    {!! Toastr::message() !!}
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{ asset('asset/img/loader/loader.svg') }}" alt="loader">
                    </div>
                </div>
            </div>

            <!-- end pre-loader -->


            <!-- begin app-header -->
            @include('dashboard.partials.header')
            <!-- end app-header -->

            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                @include('dashboard.partials.sidebar')
                <!-- end app-navbar -->

                <!-- begin app-main -->
                @yield('content')
                <!-- end app-main -->

            </div>
            <!-- end app-container -->


            <!-- begin footer -->
            <!-- end footer -->
            <!-- begin   things modal -->
            @include('dashboard.partials.footer')


            <!-- end   things modal -->

        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    @include('dashboard.partials.adminModal')


    <!-- Scripts

        ================================================== -->
    @stack('scriptEventModal')

    <script src={{ asset('asset/js/vendors.js') }}></script>

    <!-- custom app -->
    <script src={{ asset('asset/js/app.js') }}></script>

    @livewireScripts()

</body>

</html>
