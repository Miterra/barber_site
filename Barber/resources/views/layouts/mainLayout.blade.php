<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Imko Barber')</title>

    @yield('styles')
</head>
<body>
    @include('shared.message')

    @yield('content')
</body>
</html>
