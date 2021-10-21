<!DOCTYPE html>
<html lang="kr">
<head>
    <title>@yield('title', 'CozyFex')</title>
    @section('head')@show
    @stack('base-styles')
</head>
<body>
    @section('base-content')@show
    @stack('base-scripts')
</body>
</html>

