@extends('layouts.dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="col-sm-12">
            <h1 class="m-0 float-left">Halaman Berita</h1>
            <a href="/dashboard/berita/create" class="btn btn-success float-right">Buat Berita</a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="card-body">
        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beritas as $berita)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $berita->judul_berita }}</td>
                    <td class="align-middle">{{ $berita->category->nama }}</td>
                    <td class="align-middle">
                        <div class="row">
                            <a href="/dashboard/berita/{{ $berita->slug }}" class="btn btn-success btn-sm mr-1"><i class="far fa-eye mr-1"></i> Lihat</a>
                            <a href="/dashboard/berita/{{ $berita->slug }}/edit" class="btn btn-info btn-sm mr-1"><i class="fa fa-pen mr-1"></i> Ubah</a>
                            <form action="/dashboard/berita/{{ $berita->slug }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data?')"><i class="fa fa-trash mr-1"></i> Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
</div>
@endsection
