<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use App\Models\Plant;
use App\Models\Event;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalKategori = Kategori::count();
        $totalPlant = Plant::count();
        $totalEvent = Event::count();
        
        $totalPerluPerhatian = Plant::where('kondisi', '!=', 'Sehat')->count();
        
        $tanamanPerKategori = Kategori::query()
            ->withCount('plants')
            ->orderByDesc('plants_count')
            ->get(['id', 'nama']);
            
        $kondisiCounts = Plant::select('kondisi')
            ->selectRaw('count(*) as total')
            ->groupBy('kondisi')
            ->pluck('total', 'kondisi');
            
        $tanamanPerKondisi = collect(['Sehat', 'Kurang Sehat', 'Sakit'])
            ->mapWithKeys(fn ($kondisi) => [$kondisi => $kondisiCounts[$kondisi] ?? 0]);
            
        $tanamanPerluPerhatian = Plant::with('kategori')
            ->where('kondisi', '!=', 'Sehat')
            ->orderBy('kondisi')
            ->limit(5)
            ->get();
            
        $eventTerbaru = Event::with('plant')
            ->orderByDesc('tgl_event')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalKategori',
            'totalPlant',
            'totalEvent',
            'totalPerluPerhatian',
            'tanamanPerKategori',
            'tanamanPerKondisi',
            'tanamanPerluPerhatian',
            'eventTerbaru'
        ));
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
