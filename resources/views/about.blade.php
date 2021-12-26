@extends('layouts.app')
@section('content')
<div class="container py-4 mt-5 mb-3 d-flex justify-content-center">
    <div class="card col-md-5 shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <img src="{{ asset('img/profile-1.jpg') }}" class="rounded-circle" height="96px;">
                </div>
                <div class="col-md-9">    
                    <h5 class="fw-bold">Shaynendra Dika Destyawan</h5>
                    <h6>shaynendradika@smkn1tebas.sch.id</h6>
                    <h6 class="mt-4 mb-0">www.shaynendradika.my.id</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
