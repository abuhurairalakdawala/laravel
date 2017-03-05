<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=\App\Facades\HtmlTags::title()?></title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
</head>
<body>
    @yield('content')
    <script>
        window.CSRF = {!! json_encode([ 'X-CSRF-Token' => csrf_token() ]) !!};
    </script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/script.js') }}"></script>
</body>
</html>
