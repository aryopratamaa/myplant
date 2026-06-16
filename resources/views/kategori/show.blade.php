@extends('layouts.master')
@section('title', 'Detail Kategori')

@section('content')
<div class="row">
    <div class="col-xl-8 mx-auto">
        <div class="card border-0 shadow-sm rounded-4 w-100 p-2">
            <div class="card-body">

                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="ti ti-eye fs-6"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-0">Rincian Data Kategori</h5>
                </div>

                <table class="table table-borderless align-middle mb-0">
                    <tbody>
                        <tr>
                            <th width="35%" class="text-muted fw-semibold pb-3">Nama Kategori</th>
                            <td class="pb-3 fw-semibold text-dark fs-4">{{ $kategori->nama }}</td>
                        </tr>
                        <tr class="border-top">
                            <th class="text-muted fw-semibold py-3 align-top">Deskripsi Lengkap</th>
                            <td class="py-3 text-wrap text-dark" style="line-height: 1.6;">{{ $kategori->deskripsi ?? 'Tidak ada deskripsi untuk kategori ini.' }}</td>
                        </tr>
                        <tr class="border-top">
                            <th class="text-muted fw-semibold py-3">Tanggal Didaftarkan</th>
                            <td class="py-3 text-dark">{{ $kategori->created_at ? $kategori->created_at->format('d F Y - H:i') : '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="d-flex justify-content-end pt-4 border-top mt-4">
                    <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold">
                        <i class="ti ti-arrow-left fs-5"></i> Kembali ke Daftar
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection