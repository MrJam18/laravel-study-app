<!doctype html>
<html lang="en">
<head>
    @include('layouts.head', ['title' => $title, 'cssLink' => $cssLinks])
</head>
<body>
    @include('layouts.users.components.header', ['menuRoutes' => $menuRoutes])
    @include('layouts.users.components.categories', ['categories' => $categories])
    @yield('content')
    @include('layouts.footer')
    @include('layouts.scripts')
</body>
