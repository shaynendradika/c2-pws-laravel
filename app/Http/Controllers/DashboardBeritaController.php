<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardBeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        return view('dashboard.berita.index', compact('beritas'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.berita.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_berita' => 'required|max:255',
            'slug' => 'required',
            'category_id' => 'required',
            'isi_berita' => 'required'
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->isi_berita), 100);
        $validatedData['published_at'] = Carbon::now();

        Berita::create($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berhasil menambahkan berita baru.');
    }

    public function show(Berita $beritum)
    {
        $berita = $beritum;
        return view('dashboard.berita.show', compact('berita'));
    }

    public function edit(Berita $beritum)
    {
        $berita = $beritum;
        $categories = Category::all();
        return view('dashboard.berita.edit', compact('berita', 'categories'));
    }

    public function update(Request $request, Berita $beritum)
    {
        $rules = [
            'judul_berita' => 'required|max:255',
            'category_id' => 'required',
            'isi_berita' => 'required'
        ];

        if($request->slug != $beritum->slug){
            $rules['slug'] ='required|unique:beritas';
        }

        $validatedData = $request->validate($rules);
        $validatedData['excerpt'] = Str::limit(strip_tags($request->isi_berita), 100);

        Berita::where('id', $beritum->id)->update($validatedData);
        return redirect('/dashboard/berita')->with('success', 'Berhasil memperbaharui berita.');
    }

    public function destroy(Berita $beritum)
    {
        Berita::destroy($beritum->id);
        return redirect('/dashboard/berita')->with('success', 'Berhasil menghapus berita.');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul_berita);
        return response()->json(['slug' => $slug]);
    }
}
