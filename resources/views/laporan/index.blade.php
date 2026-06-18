@extends('layouts.master')
@section('title', 'Laporan')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Cetak Laporan</h5>
        
        <form action="{{ route('laporan.cetak') }}" method="GET" target="_blank">
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Laporan</label>
                <select name="jenis" id="jenis" class="form-select" required>
                    <option value="" disabled selected>-- Pilih jenis laporan --</option>
                    <option value="kategori">List Kategori</option>
                    <option value="tanaman">List Tanaman (Semua)</option>
                    <option value="tanaman_kategori">List Tanaman berdasarkan Kategori</option>
                    <option value="event">List Event (Semua)</option>
                    <option value="event_kategori">List Event berdasarkan Kategori</option>
                    <option value="event_kategori_tipe">List Event berdasarkan Kategori &amp; Tipe Event</option>
                </select>
            </div>

            <div class="mb-3 field-kategori d-none">
                <label for="kategori_id" class="form-label">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-select">
                    <option value="" disabled selected>-- Pilih kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 field-tipe-event d-none">
                <label for="tipe_event" class="form-label">Tipe Event</label>
                <select name="tipe_event" id="tipe_event" class="form-select">
                    <option value="" disabled selected>-- Pilih tipe event --</option>
                    @foreach ($tipeEvents as $tipe)
                        <option value="{{ $tipe }}">{{ $tipe }}</option>
                    @endforeach
                </select>
                @if ($tipeEvents->isEmpty())
                    <small class="text-muted">Belum ada data event, jadi daftar tipe event masih kosong.</small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">
                <iconify-icon icon="solar:file-text-bold-duotone" class="fs-5 me-1"></iconify-icon>
                Cetak PDF
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jenisField = document.getElementById('jenis');
        const fieldKategori = document.querySelector('.field-kategori');
        const fieldTipeEvent = document.querySelector('.field-tipe-event');
        const kategoriSelect = document.getElementById('kategori_id');
        const tipeEventSelect = document.getElementById('tipe_event');
        
        const perluKategori = ['tanaman_kategori', 'event_kategori', 'event_kategori_tipe'];
        const perluTipeEvent = ['event_kategori_tipe'];

        jenisField.addEventListener('change', function () {
            const jenis = this.value;
            
            const tampilKategori = perluKategori.includes(jenis);
            fieldKategori.classList.toggle('d-none', !tampilKategori);
            kategoriSelect.required = tampilKategori;
            if (!tampilKategori) kategoriSelect.value = '';

            const tampilTipeEvent = perluTipeEvent.includes(jenis);
            fieldTipeEvent.classList.toggle('d-none', !tampilTipeEvent);
            tipeEventSelect.required = tampilTipeEvent;
            if (!tampilTipeEvent) tipeEventSelect.value = '';
        });
    });
</script>
@endsection