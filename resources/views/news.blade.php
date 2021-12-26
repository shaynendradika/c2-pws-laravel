@extends('layouts.app')
@section('content')
<div class="container py-4 mt-5 mb-3 d-flex justify-content-center">
    <h1>News</h1>
</div>
<div class="container">
    @foreach ($news as $x)
    <a href="{{ route('news_detail', $x->slug) }}" class="text-decoration-none"><article class="mb-5 shadow p-3 rounded w-75 mx-auto">
        <h4>{{ $x->judul_berita }}</h4>
        <p class="text-justify text-dark">{{ $x->excerpt }} ...</p>
        <i class="text-dark">Ditulis oleh Shaynendra Dika Destyawan</i>
    </article></a>
    @endforeach    
</div>
@endsection
