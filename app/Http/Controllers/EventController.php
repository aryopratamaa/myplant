<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Plant;

use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data event beserta relasi tanamannya, diurutkan dari yang terbaru
        // $events = Event::with('plant')->latest()->get();

        // PERBAIKAN: Mengganti get() menjadi paginate(5)
        $events = Event::with('plant')->latest()->paginate(5);
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua data tanaman untuk ditampilkan di dropdown form
        $plants = Plant::orderBy('nama_tanaman')->get();
        return view('event.create', compact('plants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi inputan
        $validatedData = $request->validate([
            'plant_id' => 'required|exists:plants,id',
            'tipe_event' => 'required|in:O,I',
            'tgl_event' => 'required|date',
            'lokasi' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan ke database
        Event::create($validatedData);

        return redirect()->route('event.index')->with('success', 'Jadwal event berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::with('plant')->findOrFail($id);
        return view('event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        $plants = Plant::orderBy('nama_tanaman')->get();

        return view('event.edit', compact('event', 'plants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'plant_id' => 'required|exists:plants,id',
            'tipe_event' => 'required|in:O,I',
            'tgl_event' => 'required|date',
            'lokasi' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
        ]);

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        return redirect()->route('event.index')->with('success', 'Jadwal event berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('event.index')->with('success', 'Jadwal event berhasil dihapus!');
    }
}
