@extends('layouts.master')
@section('title', 'Data Tanaman')

@section('content')
<div class="card border-0 shadow-sm rounded-4 w-100">
    <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title fw-semibold mb-0">Inventaris Tanaman</h5>
            <div class="d-flex gap-2">
                <input type="text" class="form-control" placeholder="Cari tanaman...">
                <button class="btn btn-primary d-flex align-items-center gap-2 rounded-pill">
                    <i class="ti ti-plus fs-5"></i> Tambah Data
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tanaman</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Kategori</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Stok/Bibit</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Kondisi</h6>
                        </th>
                        <th class="border-bottom-0 text-center">
                            <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-bottom-0 d-flex align-items-center gap-3">
                            <img src="https://png.pngtree.com/png-clipart/20240310/original/pngtree-monstera-deliciosa-monstera-giant-leaf-on-white-pot-air-purification-planthouse-png-image_14550252.png" alt="Monstera" class="rounded-circle object-fit-cover" width="45" height="45">
                            <div>
                                <h6 class="fw-semibold mb-1 text-dark">Monstera Deliciosa</h6>
                                <span class="text-muted fs-3">Janda Bolong</span>
                            </div>
                        </td>
                        <td class="border-bottom-0"><span class="badge bg-light text-dark fw-normal rounded-pill">Tanaman Hias</span></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">120 <span class="text-muted fs-3 fw-normal">Pot</span></h6>
                        </td>
                        <td class="border-bottom-0">
                            <span class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-check me-1"></i>Sehat</span>
                        </td>
                        <td class="border-bottom-0 text-center">
                            <a href="#" class="text-primary fs-5 me-2"><i class="ti ti-eye"></i></a>
                            <a href="#" class="text-info fs-5 me-2"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="text-danger fs-5"><i class="ti ti-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border-bottom-0 d-flex align-items-center gap-3">
                            <img src="https://unair.ac.id/wp-content/uploads/2022/05/Foto-by-Halodoc-3.jpg" alt="Lidah Buaya" class="rounded-circle object-fit-cover" width="45" height="45">
                            <div>
                                <h6 class="fw-semibold mb-1 text-dark">Aloe Vera</h6>
                                <span class="text-muted fs-3">Lidah Buaya</span>
                            </div>
                        </td>
                        <td class="border-bottom-0"><span class="badge bg-light text-dark fw-normal rounded-pill">Tanaman Obat</span></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">85 <span class="text-muted fs-3 fw-normal">Pot</span></h6>
                        </td>
                        <td class="border-bottom-0">
                            <span class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-check me-1"></i>Sehat</span>
                        </td>
                        <td class="border-bottom-0 text-center">
                            <a href="#" class="text-primary fs-5 me-2"><i class="ti ti-eye"></i></a>
                            <a href="#" class="text-info fs-5 me-2"><i class="ti ti-pencil"></i></a>
                            <a href="#" class="text-danger fs-5"><i class="ti ti-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection