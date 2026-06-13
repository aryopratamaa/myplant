@extends('layouts.master')
@section('title', 'Dashboard Utama')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-12">
        <h4 class="fw-bold text-dark mb-1">Beranda Sistem</h4>
        <p class="text-muted mb-0">Selamat datang! Silakan pilih modul di bawah ini untuk mengelola data.</p>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 hover-card">
            <div class="card-body p-4 text-center">
                <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px;">
                    <i class="ti ti-category" style="font-size: 2.2rem;"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Kategori</h5>
                <p class="text-muted fs-3 mb-4">Kelola klasifikasi dan jenis kelompok tanaman.</p>
                <a href="{{ url('/kategori') }}" class="btn btn-outline-primary w-100 rounded-pill fw-semibold">Buka Kategori</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 hover-card">
            <div class="card-body p-4 text-center">
                <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px;">
                    <i class="ti ti-leaf" style="font-size: 2.2rem;"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Data Tanaman</h5>
                <p class="text-muted fs-3 mb-4">Inventarisasi stok, kondisi, dan bibit tanaman.</p>
                <a href="{{ url('/tanaman') }}" class="btn btn-outline-success w-100 rounded-pill fw-semibold">Buka Tanaman</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 hover-card">
            <div class="card-body p-4 text-center">
                <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px;">
                    <i class="ti ti-calendar-event" style="font-size: 2.2rem;"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Manajemen Event</h5>
                <p class="text-muted fs-3 mb-4">Jadwalkan pameran, workshop, dan agenda lainnya.</p>
                <a href="{{ url('/event') }}" class="btn btn-outline-warning w-100 rounded-pill fw-semibold">Buka Event</a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 hover-card">
            <div class="card-body p-4 text-center">
                <div class="bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px;">
                    <i class="ti ti-file-analytics" style="font-size: 2.2rem;"></i>
                </div>
                <h5 class="fw-bold text-dark mb-2">Laporan Sistem</h5>
                <p class="text-muted fs-3 mb-4">Lihat statistik, ringkasan data, dan cetak dokumen.</p>
                <a href="{{ url('/laporan') }}" class="btn btn-outline-info w-100 rounded-pill fw-semibold">Buka Laporan</a>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.06) !important;
    }
</style>
@endsection