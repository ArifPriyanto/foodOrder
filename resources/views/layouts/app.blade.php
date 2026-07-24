<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food Order System</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="d-flex">

    @include('layouts.sidebar')

    <div class="flex-grow-1">

        @include('layouts.navbar')

        <div class="container-fluid p-4">

            @yield('content')
            {{ $slot ?? '' }}

        </div>

    </div>

</div>

</body>
</html>
