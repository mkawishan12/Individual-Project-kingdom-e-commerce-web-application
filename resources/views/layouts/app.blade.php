<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    {{-- alertify scripts --}}


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>   @yield('title')</title>
    <meta name="description" content=" @yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Maneesha Kawishan">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Styles -->

        <link href = "{{ asset('assets/css/bootstrap.min.css') }}" rel = "stylesheet">
        <link href = "{{ asset('assets/css/custom.css') }}" rel = "stylesheet">
        {{-- Owl carousel --}}
        <link href = "{{ asset('assets/css/owl.carousel.min.css') }}" rel = "stylesheet">
        <link href = "{{ asset('assets/css/owl.theme.default.min.css') }}" rel = "stylesheet">

        {{-- Exzoom --}}
        <link href = "{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel = "stylesheet">

        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

        @livewireStyles

</head>
<body>
    <div id="app">
        @include('layouts.inc.frontend.navbar')

        <main>
            @yield('content')
        </main>
    </div>
         <!-- Scripts -->
        <script src="{{asset('assets/js/jquery-3.6.4.min.js') }}" ></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js') }}" ></script>

        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
            <script>

                window.addEventListener('message', event => {


                    alertify.set('notifier','position', 'top-right');
                    alertify.notify(event.detail.text, event.detail.type);
                });

            </script>
            <script src="{{asset('assets/js/owl.carousel.min.js') }}" ></script>

            <script src="{{asset('assets/exzoom/jquery.exzoom.js') }}" ></script>


            @yield('script')

        @livewireScripts
        @stack('scripts')
</body>
</html>
