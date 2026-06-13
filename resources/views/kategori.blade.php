@extends('index')
@section('title', 'Data Kategori')

@section('content')
<div class="card border-0 shadow-sm rounded-4 w-100">
    <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title fw-semibold mb-0">Daftar Kategori Tanaman</h5>
            <button class="btn btn-primary d-flex align-items-center gap-2 rounded-pill">
                <i class="ti ti-plus fs-5"></i> Tambah Kategori
            </button>
        </div>

        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4 bg-light rounded-3">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Nama Kategori</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Total Tanaman</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                        <th class="border-bottom-0 text-center">
                            <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">1</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1 text-dark">Tanaman Hias</h6>
                            <span class="text-muted fs-3">Kategori untuk dekorasi dalam & luar ruangan</span>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">45 Jenis</p>
                        </td>
                        <td class="border-bottom-0">
                            <span class="badge bg-success-subtle text-success rounded-3 fw-semibold">Aktif</span>
                        </td>
                        <td class="border-bottom-0 text-center">
                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle p-2 me-1"><i class="ti ti-pencil fs-4"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-danger rounded-circle p-2"><i class="ti ti-trash fs-4"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">2</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1 text-dark">Tanaman Obat (Toga)</h6>
                            <span class="text-muted fs-3">Tanaman herbal untuk kesehatan</span>
                        </td>
                        <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">28 Jenis</p>
                        </td>
                        <td class="border-bottom-0">
                            <span class="badge bg-success-subtle text-success rounded-3 fw-semibold">Aktif</span>
                        </td>
                        <td class="border-bottom-0 text-center">
                            <a href="#" class="btn btn-sm btn-outline-primary rounded-circle p-2 me-1"><i class="ti ti-pencil fs-4"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-danger rounded-circle p-2"><i class="ti ti-trash fs-4"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection