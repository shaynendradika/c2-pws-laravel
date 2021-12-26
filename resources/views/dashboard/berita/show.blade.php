@extends('layouts.dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="col-sm-12">
            <h1 class="m-0">Halaman Berita</h1>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <article>
                <div class="row">
                    <h4 class="col-sm-12 col-md-9">{{ $berita->judul_berita }}</h4>
                    <span class="col-sm-12 col-md-3 text-right">{{ ($berita->published_at)->isoFormat('dddd, D MMMM Y'); }} &ndash; <b>#{{ $berita->category->nama }}</b></span>
                </div>
                <p>{!! $berita->isi_berita !!}</p>
    
                <div class="row">
                    <a href="/dashboard/berita" class="btn btn-success mr-1">Kembali</a>
                    <a href="/dashboard/berita/{{ $berita->slug }}/edit" class="btn btn-info mr-1">Edit</a>
                    <form action="/dashboard/berita/{{ $berita->slug }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</button>
                    </form>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection
