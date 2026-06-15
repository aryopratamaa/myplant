<?php

namespace App\Http\Controllers;

// WAJIB DITAMBAHKAN: Memberi tahu Controller di mana letak Model & Storage
use App\Models\Plant;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Variabel diubah menjadi $plants (jamak) agar cocok dengan view index.blade.php
        $plants = Plant::with('kategori')->latest()->get();
        return view('plant.index', compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Typo diperbaiki: Kategori::all(), bukan Kategoris::all()
        $kategoris = Kategori::all();
        return view('plant.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_tanaman' => 'required|string|max:150',
            'tgl_tanam' => 'required|date',
            'lokasi' => 'required|string|max:100',
            'kondisi' => 'required|in:Sehat,Kurang Sehat,Sakit',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'catatan' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            // Variabel disamakan menjadi $fotoPath
            $fotoPath = $request->file('foto')->store('public/fotos');
            $validatedData['foto'] = basename($fotoPath);
        }

        Plant::create($validatedData);

        return redirect()->route('plant.index')->with('success', 'Data tanaman berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plant = Plant::findOrFail($id);
        $kategoris = Kategori::all();
        return view('plant.edit', compact('plant', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'nama_tanaman' => 'required|string|max:150',
            'tgl_tanam' => 'required|date',
            'lokasi' => 'required|string|max:100',
            'kondisi' => 'required|in:Sehat,Kurang Sehat,Sakit',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'catatan' => 'nullable|string',
        ]);

        $plant = Plant::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($plant->foto && Storage::exists('public/fotos/' . $plant->foto)) {
                Storage::delete('public/fotos/' . $plant->foto);
            }
            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('public/fotos');
            $validatedData['foto'] = basename($fotoPath);
        }

        $plant->update($validatedData);

        return redirect()->route('plant.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plant = Plant::findOrFail($id);
        
        // Hapus foto dari server sebelum datanya dihapus
        if ($plant->foto && Storage::exists('public/fotos/' . $plant->foto)) {
            Storage::delete('public/fotos/' . $plant->foto);
        }
        $plant->delete();

        return redirect()->route('plant.index')->with('success', 'Data berhasil dihapus.');
    }
}