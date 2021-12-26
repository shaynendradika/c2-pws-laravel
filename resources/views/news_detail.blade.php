@extends('layouts.app')
@section('content')
<div class="container py-4 mt-5 mb-3 d-flex justify-content-center">
    <h1>News</h1>
</div>
<div class="container">
    <div class="row">
        <h4 class="col-sm-12 col-md-9">{{ $news->judul_berita }}</h4>
        <span class="col-sm-12 col-md-3 text-dark text-right">{{ ($news->published_at)->isoFormat('dddd, D MMMM Y'); }} &ndash; <b>#{{ $news->category->nama }}</b></span>
    </div>
    <div class="text-justify mb-4 mt-4">{!! $news->isi_berita !!}</div>
    <i class="text-dark">Ditulis oleh Shaynendra Dika Destyawan</i>
    <div class="row my-4 px-2">
        <a href="{{ route('news') }}" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection
