<link href='{{\asset('css/bootstrap/bootstrap.min.css')}}' rel="stylesheet">
<meta name="csrf-token" content="{{ \csrf_token() }}">
<script src="https://kit.fontawesome.com/a85a04e757.js" crossorigin="anonymous"></script>
<link rel='stylesheet' href='{{\asset('css/general.css')}}'>
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
<title>Новостной портал - {{$title}}</title>
@stack('css')
@foreach($cssLinks as $link)
    <link rel='stylesheet' href='{{$link}}'>
@endforeach
