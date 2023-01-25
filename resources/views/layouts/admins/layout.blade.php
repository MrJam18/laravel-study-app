<!doctype html>
<html lang="en">
<head>
    @include('layouts.head', ['cssLinks' => $cssLinks])
</head>
<body>
    @include('layouts.admins.components.header')
    <div class="flex">
    @include('layouts.admins.components.menu', ['menuLists'=> $menuLists])

    @yield('content')
    </div>
    @include('layouts.scripts')
</body>
