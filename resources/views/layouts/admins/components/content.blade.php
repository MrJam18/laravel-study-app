@extends('layouts.admins.layout')
@section('content')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            @include($viewPath, $data)
        </main>
@endsection
