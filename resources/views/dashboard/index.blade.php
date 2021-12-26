@extends('layouts.dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="col-sm-12">
            <h1 class="m-0">Selamat Datang - {{ auth()->user()->name }}</h1>
        </div>
    </div>
</div>
@endsection