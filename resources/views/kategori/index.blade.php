@extends('layouts.master')
@section('title', 'Daftar Kategori')

@section('content')
<div class="card border-0 shadow-sm rounded-4 w-100">
    <div class="card-body p-4">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5 class="card-title fw-semibold mb-0">Daftar Kategori</h5>
            <a href="{{ route('kategori.create') }}" class="btn btn-primary d-flex align-items-center gap-2 rounded-pill fw-semibold shadow-sm">
                <i class="ti ti-plus fs-5"></i> Tambah Kategori
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover text-nowrap mb-0 align-middle border-bottom">
                <thead class="text-dark fs-4 bg-light">
                    <tr>
                        <th class="border-bottom-0 rounded-start" width="5%">
                            <h6 class="fw-semibold mb-0">No</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Nama Kategori</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Deskripsi</h6>
                        </th>
                        <th class="border-bottom-0 rounded-end text-center" width="15%">
                            <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategoris as $index => $kategori)
                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1 text-dark">{{ $kategori->nama }}</h6>
                        </td>
                        <td class="border-bottom-0">
                            <span class="text-muted fs-3">{{ $kategori->deskripsi ?? 'Tidak ada deskripsi' }}</span>
                        </td>
                        <td class="border-bottom-0 text-center">
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-sm btn-outline-info rounded-circle p-2 me-1" title="Edit Data">
                                <i class="ti ti-pencil fs-4"></i>
                            </a>
                            
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                        <td colspan="4" class="text-center py-5">
                            <i class="ti ti-folder-x fs-8 text-muted mb-3 d-block"></i>
                            <h6 class="text-muted mb-0 fw-normal">Belum ada data kategori yang ditambahkan.</h6>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection