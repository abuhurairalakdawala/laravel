<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=\App\Facades\HtmlTags::title()?></title>
    <!-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <?=\App\Facades\Assets::css()?>
</head>
<body>
    @yield('content')
    <script>
        window.CSRF = {!! json_encode([ 'X-CSRF-Token' => csrf_token() ]) !!};
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
    <?=\App\Facades\Assets::js()?>
</body>
</html>
