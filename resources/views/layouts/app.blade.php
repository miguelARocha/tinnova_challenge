<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tinnova')</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: sans-serif;
            background-color: #333;
            margin: 0;
            padding: 20px;
        }
    </style>

</head>
<body>
    @yield('content')
</body>
</html>