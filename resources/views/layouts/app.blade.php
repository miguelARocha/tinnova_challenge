<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Tinnova')</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
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