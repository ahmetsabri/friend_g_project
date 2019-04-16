<html>
    <head>
        <title>Admin - @yield('title')</title>
        <link rel="stylesheet" href="{{asset('css/bs.min.css')}}">
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
        <script type="text/javascript" src="{{asset('js/jq.min.js')}}">
        </script>
        <script type="text/javascript" src="{{asset('js/bs.min.js')}}">
        </script>
    </body>
</html>
