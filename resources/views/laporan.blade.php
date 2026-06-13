@extends('index')
@section('title', 'Laporan Sistem')

@section('content')
<h5 class="card-title fw-semibold mb-4">Ringkasan Laporan</h5>

<!-- Kartu Statistik -->
<div class="row">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 bg-primary-subtle text-primary">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                <div>
                    <p class="fw-semibold mb-1 text-uppercase" style="letter-spacing: 1px; font-size: 0.8rem;">Total Tanaman</p>
                    <h3 class="fw-bolder mb-0 text-primary">1,452</h3>
                </div>
                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px;">
                    <i class="ti ti-leaf fs-7 text-primary"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 bg-success-subtle text-success">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                <div>
                    <p class="fw-semibold mb-1 text-uppercase" style="letter-spacing: 1px; font-size: 0.8rem;">Kategori Aktif</p>
                    <h3 class="fw-bolder mb-0 text-success">18</h3>
                </div>
                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px;">
                    <i class="ti ti-category fs-7 text-success"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm rounded-4 bg-warning-subtle text-warning">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                <div>
                    <p class="fw-semibold mb-1 text-uppercase" style="letter-spacing: 1px; font-size: 0.8rem;">Event Berjalan</p>
                    <h3 class="fw-bolder mb-0 text-warning">5</h3>
                </div>
                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 55px; height: 55px;">
                    <i class="ti ti-calendar-star fs-7 text-warning"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Log Aktivitas Terbaru -->
<div class="card border-0 shadow-sm rounded-4 w-100 mt-2">
    <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title fw-semibold mb-0">Log Aktivitas Terbaru</h5>
            <button class="btn btn-sm btn-outline-dark rounded-pill px-3"><i class="ti ti-download me-1"></i> Ekspor PDF</button>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Waktu</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Pengguna</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Aktivitas</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">Hari ini, 10:24 WIB</p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-dark">Admin Utama</h6>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">Menambahkan 50 stok <b>Monstera Deliciosa</b></p>
                        </td>
                        <td class="border-bottom-0"><span class="badge bg-success rounded-3 fw-semibold">Sukses</span></td>
                    </tr>
                    <tr>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">Kemarin, 15:40 WIB</p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-dark">Staf Event</h6>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">Membuat jadwal baru: <b>Workshop Hidroponik</b></p>
                        </td>
                        <td class="border-bottom-0"><span class="badge bg-success rounded-3 fw-semibold">Sukses</span></td>
                    </tr>
                    <tr>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">10 Jun 2026, 09:15 WIB</p>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 text-dark">Admin Utama</h6>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">Menghapus kategori <b>Tanaman Liar</b></p>
                        </td>
                        <td class="border-bottom-0"><span class="badge bg-danger rounded-3 fw-semibold">Dihapus</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection