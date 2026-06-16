<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Event;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        {
            // Menangkap filter jenis laporan dari URL, default-nya adalah 'tanaman'
            $jenis = $request->input('jenis', 'tanaman');
            
            $plants = [];
            $events = [];

            // Logika Filter Data
            if ($jenis == 'tanaman') {
                // Jika pilih Tanaman, ambil semua data tanaman
                $plants = Plant::with('kategori')->orderBy('tgl_tanam', 'desc')->get();
            } else {
                // Jika pilih Event, ambil data event berdasarkan filter tanggal
                $query = Event::with('plant')->orderBy('tgl_event', 'desc');
                
                if ($request->filled('tgl_awal') && $request->filled('tgl_akhir')) {
                    $query->whereBetween('tgl_event', [$request->tgl_awal, $request->tgl_akhir]);
                }
                
                $events = $query->get();
            }

            // Kirim semua data ke 1 file index
            return view('laporan.index', compact('jenis', 'plants', 'events'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
