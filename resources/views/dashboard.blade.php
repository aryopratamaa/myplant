@extends('layouts.master')
@section('title', 'Dashboard Utama')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-primary-subtle relative">
            <div class="card-body p-4 p-md-5 position-relative z-1">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="fw-bolder text-primary mb-2">Selamat Datang di Sistem Manajemen Botani! 🌿</h3>
                        <p class="text-dark fs-4 mb-0 opacity-75">
                            Pantau inventaris tanaman, kelola klasifikasi, dan jadwalkan kegiatan harian Anda dengan mudah melalui panel metrik di bawah ini.
                        </p>
                    </div>
                </div>
            </div>
            <div class="position-absolute top-0 end-0 opacity-25" style="transform: translate(20%, -20%);">
                <i class="ti ti-leaf text-primary" style="font-size: 15rem;"></i>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 modern-stat-card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Total Kategori</p>
                        <h2 class="fw-bolder text-dark mb-0">{{ $totalKategori ?? 0 }}</h2>
                    </div>
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center stat-icon-box" style="width: 55px; height: 55px;">
                        <i class="ti ti-category fs-7"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('kategori.index') }}" class="btn btn-outline-primary btn-sm rounded-pill w-100 fw-semibold fw-bold">Kelola Kategori <i class="ti ti-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 modern-stat-card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Inventaris Tanaman</p>
                        <h2 class="fw-bolder text-dark mb-0">{{ $totalTanaman ?? 0 }}</h2>
                    </div>
                    <div class="bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center stat-icon-box" style="width: 55px; height: 55px;">
                        <i class="ti ti-leaf fs-7"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('plant.index') }}" class="btn btn-outline-success btn-sm rounded-pill w-100 fw-semibold fw-bold">Cek Tanaman <i class="ti ti-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 modern-stat-card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <p class="text-muted fw-semibold mb-1 text-uppercase" style="font-size: 0.8rem; letter-spacing: 1px;">Jadwal Event</p>
                        <h2 class="fw-bolder text-dark mb-0">{{ $totalEvent ?? 0 }}</h2>
                    </div>
                    <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center stat-icon-box" style="width: 55px; height: 55px;">
                        <i class="ti ti-calendar-event fs-7"></i>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('event.index') }}" class="btn btn-outline-warning btn-sm rounded-pill w-100 fw-semibold fw-bold">Lihat Agenda <i class="ti ti-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 modern-stat-card border-info border-bottom border-3">
            <div class="card-body p-4 d-flex flex-column justify-content-center text-center">
                <div class="bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 60px; height: 60px;">
                    <i class="ti ti-file-analytics fs-7"></i>
                </div>
                <h6 class="fw-bold text-dark mb-1">Pusat Laporan</h6>
                <p class="text-muted fs-2 mb-3">Unduh rekapitulasi sistem</p>
                <a href="{{ route('laporan.index') }}" class="btn btn-info text-white btn-sm rounded-pill w-100 fw-semibold">Buka Modul</a>
            </div>
        </div>
    </div>
</div>

<style>
    .modern-stat-card {
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        overflow: hidden;
    }
    .modern-stat-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.08) !important;
    }
    .stat-icon-box {
        transition: transform 0.3s ease;
    }
    .modern-stat-card:hover .stat-icon-box {
        transform: scale(1.1) rotate(5deg);
    }
</style>
@endsection