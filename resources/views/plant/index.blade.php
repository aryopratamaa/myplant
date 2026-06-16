@extends('layouts.master')
@section('title', 'Inventaris Tanaman')

@section('content')
<div class="card border-0 shadow-sm rounded-4 w-100">
    <div class="card-body p-4">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3" role="alert">
            <i class="ti ti-check fs-5 me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title fw-semibold mb-0">Inventaris Tanaman</h5>
            <a href="{{ route('plant.create') }}" class="btn btn-primary d-flex align-items-center gap-2 rounded-pill fw-semibold shadow-sm">
                <i class="ti ti-plus fs-5"></i> Tambah Data
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover text-nowrap mb-0 align-middle border-bottom">
                <thead class="text-dark fs-4 bg-light">
                    <tr>
                        <th class="border-bottom-0 rounded-start" width="5%"><h6 class="fw-semibold mb-0">No</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Foto</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Detail Tanaman</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Kategori</h6></th>
                        <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Status</h6></th>
                        <th class="border-bottom-0 rounded-end text-center" width="20%"><h6 class="fw-semibold mb-0">Aksi</h6></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($plants as $index => $plant)
                    <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $plants->firstItem() + $index }}</h6></td>
                        <td class="border-bottom-0">
                            @if($plant->foto)
                                <img src="{{ asset('storage/fotos/' . $plant->foto) }}" alt="Foto" class="rounded-3 shadow-sm border" style="width: 55px; height: 55px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted border" style="width: 55px; height: 55px;">
                                    <i class="ti ti-photo-off fs-5"></i>
                                </div>
                            @endif
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1 text-dark">{{ $plant->nama_tanaman }}</h6>
                            <span class="text-muted fs-3">Ditanam: {{ \Carbon\Carbon::parse($plant->tgl_tanam)->format('d M Y') }}</span>
                        </td>
                        <td class="border-bottom-0">
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3">{{ $plant->kategori->nama ?? '-' }}</span>
                        </td>
                        <td class="border-bottom-0">
                            @php
                                $badgeColor = $plant->kondisi == 'Sehat' ? 'success' : ($plant->kondisi == 'Kurang Sehat' ? 'warning' : 'danger');
                            @endphp
                            <span class="badge bg-{{ $badgeColor }} rounded-pill">{{ $plant->kondisi }}</span>
                        </td>
                        <td class="border-bottom-0 text-center">
                            <a href="{{ route('plant.show', $plant->id) }}" class="btn btn-sm btn-outline-primary rounded-circle p-2 me-1" title="Lihat Detail">
                                <i class="ti ti-eye fs-4"></i>
                            </a>
                            <a href="{{ route('plant.edit', $plant->id) }}" class="btn btn-sm btn-outline-info rounded-circle p-2 me-1" title="Edit Data">
                                <i class="ti ti-pencil fs-4"></i>
                            </a>
                            <form action="{{ route('plant.destroy', $plant->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data tanaman ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-2" title="Hapus Data">
                                    <i class="ti ti-trash fs-4"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <i class="ti ti-leaf fs-8 text-muted mb-3 d-block"></i>
                            <h6 class="text-muted mb-0 fw-normal">Belum ada data tanaman.</h6>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($plants->hasPages())
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 pt-3 border-top">
            <div class="text-muted fs-3 mb-3 mb-md-0">
                Menampilkan data <span class="fw-semibold text-dark">{{ $plants->firstItem() }}</span> 
                sampai <span class="fw-semibold text-dark">{{ $plants->lastItem() }}</span> 
                dari total <span class="fw-semibold text-dark">{{ $plants->total() }}</span> tanaman
            </div>
            <div class="pagination-wrapper">
                {{ $plants->links() }}
            </div>
        </div>
        @endif

    </div>
</div>

<style>
    .pagination { margin-bottom: 0; }
    .page-item.active .page-link { background-color: var(--bs-primary); border-color: var(--bs-primary); border-radius: 8px; }
    .page-link { color: var(--bs-dark); border: none; border-radius: 8px; margin: 0 2px; padding: 0.375rem 0.75rem; }
    .page-link:hover { background-color: var(--bs-light); color: var(--bs-primary); }
</style>
@endsection