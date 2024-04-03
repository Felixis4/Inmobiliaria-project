<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title', 'Home')</title>
    <style>
        body{

            }
    </style>
</head>
<body class="bg-gray-600 flex items-center justify-center h-1/2">
    @yield('content')
</body>
</html>
