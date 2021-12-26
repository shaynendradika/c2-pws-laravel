@extends('layouts.dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="col-sm-12">
            <h1 class="m-0">Halaman Berita</h1>
        </div>
    </div>    
    <div class="card mt-3">
        <div class="card-header bg-primary">
            <div class="card-title">Edit Berita</div>
        </div>
        <form action="/dashboard/berita/{{ $berita->slug }}" method="post">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="judul_berita">Judul Berita</label>
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="{{ old('judul_berita', $berita->judul_berita) }}">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $berita->slug) }}">
                </div>
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" id="category_id">
                        @foreach ($categories as $category)
                        <option {{ (old('category_id', $berita->category_id) == $category->id) ? 'selected' : '' }}  value="{{ $category->id }}">{{ $category->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="isi_berita">Isi Berita</label>
                    <textarea name="isi_berita" id="summernote">{{ old('isi_berita', $berita->isi_berita) }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    const judul_berita = document.querySelector('#judul_berita');
    const slug = document.querySelector('#slug');
    judul_berita.addEventListener('change', function(){
        fetch('/dashboard/berita/checkslug?judul_berita='+judul_berita.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })
</script>
@endsection
