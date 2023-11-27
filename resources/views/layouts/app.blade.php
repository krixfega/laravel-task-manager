<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A simple Task  application">
    <title>Task Management App: By Christian Onokharigho</title>

    <!--Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Main CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>
<body>
    <div>
        @yield('content')
    </div>


    <!-- Bootstrap JavaScript -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
