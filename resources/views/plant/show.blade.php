@extends('layouts.master')
@section('title', 'Detail Tanaman')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <div class="card border-0 shadow-sm rounded-4 w-100 p-2">
            <div class="card-body">
                
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="ti ti-eye fs-6"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-0">Rincian Data Tanaman</h5>
                </div>

                <div class="row">
                    <!-- Kolom Kiri: Bingkai Foto Minimalis -->
                    <div class="col-lg-5 mb-4 mb-lg-0">
                        <div class="border border-light-subtle rounded-4 p-2 shadow-sm bg-white w-100">
                            @if($plant->foto)
                                <!-- aspect-ratio 4/3 membuat bingkai selalu konsisten dan rapi -->
                                <img src="{{ asset('storage/fotos/' . $plant->foto) }}" class="rounded-3 w-100" style="object-fit: cover; aspect-ratio: 4/3; max-height: 450px;" alt="Foto {{ $plant->nama_tanaman }}">
                            @else
                                <div class="rounded-3 bg-light d-flex flex-column align-items-center justify-content-center w-100" style="aspect-ratio: 4/3; border: 2px dashed #dee2e6;">
                                    <i class="ti ti-photo-off text-muted mb-2" style="font-size: 4rem;"></i>
                                    <span class="d-block text-muted fs-3">Tidak ada foto</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Kolom Kanan: Tabel Data -->
                    <div class="col-lg-7">
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr>
                                    <th width="35%" class="text-muted fw-semibold pb-3">Nama Tanaman</th>
                                    <td class="pb-3 fw-semibold text-dark fs-4">{{ $plant->nama_tanaman }}</td>
                                </tr>
                                <tr class="border-top">
                                    <th class="text-muted fw-semibold py-3">Kategori</th>
                                    <td class="py-3"><span class="badge bg-primary-subtle text-primary rounded-pill px-3">{{ $plant->kategori->nama ?? '-' }}</span></td>
                                </tr>
                                <tr class="border-top">
                                    <th class="text-muted fw-semibold py-3">Tanggal Tanam</th>
                                    <td class="py-3 text-dark">{{ \Carbon\Carbon::parse($plant->tgl_tanam)->format('d F Y') }}</td>
                                </tr>
                                <tr class="border-top">
                                    <th class="text-muted fw-semibold py-3">Lokasi Penanaman</th>
                                    <td class="py-3 text-dark">{{ $plant->lokasi }}</td>
                                </tr>
                                <tr class="border-top">
                                    <th class="text-muted fw-semibold py-3">Kondisi Saat Ini</th>
                                    <td class="py-3">
                                        @php
                                            $badgeColor = $plant->kondisi == 'Sehat' ? 'success' : ($plant->kondisi == 'Kurang Sehat' ? 'warning' : 'danger');
                                        @endphp
                                        <span class="badge bg-{{ $badgeColor }} rounded-pill px-3">{{ $plant->kondisi }}</span>
                                    </td>
                                </tr>
                                <tr class="border-top">
                                    <th class="text-muted fw-semibold py-3 align-top">Catatan Tambahan</th>
                                    <td class="py-3 text-wrap text-dark" style="line-height: 1.6;">{{ $plant->catatan ?: '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-end pt-4 border-top mt-4">
                    <a href="{{ route('plant.index') }}" class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold">
                        <i class="ti ti-arrow-left fs-5"></i> Kembali ke Daftar
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection