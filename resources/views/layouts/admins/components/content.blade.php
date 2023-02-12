@extends('layouts.admins.layout')
@section('content')
    <div class="main">
    @if(session('alertType'))
        <div class="alert-container">
            <x-alert :type="\session('alertType')" :message="\session('alertMessage')"></x-alert>
        </div>
    @endif
            @include($viewPath, $data)
    </div>
@endsection
