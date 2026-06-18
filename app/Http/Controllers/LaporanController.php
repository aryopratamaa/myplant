<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Event;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    private const JENIS_LAPORAN = [
        'kategori',
        'tanaman',
        'tanaman_kategori',
        'event',
        'event_kategori',
        'event_kategori_tipe',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategoris = Kategori::orderBy('nama')->get();
        $tipeEvents = Event::select('tipe_event')
            ->distinct()
            ->orderBy('tipe_event')
            ->pluck('tipe_event');

        return view('laporan.index', compact('kategoris', 'tipeEvents'));
    }

    // Cek jenis laporan + filter dari form, mencetak PDF yang sesuai
    public function cetak(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|in:' . implode(',', self::JENIS_LAPORAN),
            'kategori_id' => 'nullable|required_if:jenis,tanaman_kategori,event_kategori,event_kategori_tipe|exists:kategori,id',
            'tipe_event' => 'nullable|required_if:jenis,event_kategori_tipe|string|max:50',
        ]);

        $kategoriId = $validated['kategori_id'] ?? null;
        $tipeEvent = $validated['tipe_event'] ?? null;

        return match ($validated['jenis']) {
            'kategori' => $this->cetakKategori(),
            'tanaman' => $this->cetakTanaman(null),
            'tanaman_kategori' => $this->cetakTanaman($kategoriId),
            'event' => $this->cetakEvent(null, null),
            'event_kategori' => $this->cetakEvent($kategoriId, null),
            'event_kategori_tipe' => $this->cetakEvent($kategoriId, $tipeEvent),
        };
    }

    private function cetakKategori()
    {
        $kategoris = Kategori::select('id', 'nama', 'deskripsi')
            ->orderBy('nama')
            ->get();

        $pdf = Pdf::loadView('laporan.pdf.kategori', [
            'title' => 'Daftar Kategori Tanaman - MyPlant',
            'date' => now()->format('d/m/Y'),
            'kategoris' => $kategoris,
        ]);

        return $pdf->stream('laporan-kategori.pdf');
    }

    private function cetakTanaman(?int $kategoriId)
    {
        $query = Plant::with('kategori')->orderBy('nama_tanaman');
        
        if ($kategoriId) {
            $query->where('kategori_id', $kategoriId);
        }

        $pdf = Pdf::loadView('laporan.pdf.tanaman', [
            'title' => 'Daftar Tanaman - MyPlant',
            'date' => now()->format('d/m/Y'),
            'plants' => $query->get(),
            'kategori' => $kategoriId ? Kategori::find($kategoriId) : null,
        ]);

        return $pdf->stream('laporan-tanaman.pdf');
    }

    private function cetakEvent(?int $kategoriId, ?string $tipeEvent)
    {
        $query = Event::with('plant.kategori')->orderBy('tgl_event', 'desc');
        
        if ($kategoriId) {
            $query->whereHas('plant', fn ($q) => $q->where('kategori_id', $kategoriId));
        }

        if ($tipeEvent) {
            $query->where('tipe_event', $tipeEvent);
        }

        $pdf = Pdf::loadView('laporan.pdf.event', [
            'title' => 'Daftar Event Tanaman - MyPlant',
            'date' => now()->format('d/m/Y'),
            'events' => $query->get(),
            'kategori' => $kategoriId ? Kategori::find($kategoriId) : null,
            'tipeEvent' => $tipeEvent,
        ]);

        return $pdf->stream('laporan-event.pdf');
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
