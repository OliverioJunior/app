<!DOCTYPE html>
<html lang="{{str_replace('_','-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config("app.name", "Laravel")}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    @yield('content')
</body>
</html>
