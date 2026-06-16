<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $kategoris = Kategori::all();
        // PERBAIKAN: Mengganti all() menjadi latest()->paginate(5)
        $kategoris = Kategori::latest()->paginate(5);

        return view("kategori.index", compact("kategoris"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("kategori.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama" => "required|string|min:5|max:100", 
            "deskripsi" => "nullable|string",
        ]);

        Kategori::create($validatedData);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return view("kategori.show", compact("kategori"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view("kategori.edit", compact("kategori"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            "nama" => "required|string|min:5|max:100",
            "deskripsi" => "nullable|string",
        ]);

        $kategori->update($validatedData);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
