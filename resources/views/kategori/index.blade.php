@extends('layouts.master')
@section('title', 'Daftar Kategori')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 w-100 p-2">
            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3" role="alert">
                    <i class="ti ti-check fs-5 me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 pb-3 border-bottom">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                        <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                            <i class="ti ti-category fs-6"></i>
                        </div>
                        <h5 class="card-title fw-semibold mb-0">Daftar Kategori</h5>
                    </div>
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary d-flex align-items-center gap-2 rounded-pill fw-semibold shadow-sm">
                        <i class="ti ti-plus fs-5"></i> Tambah Kategori
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle border-bottom mb-0">
                        <thead class="text-dark fs-4 bg-light">
                            <tr>
                                <th class="border-bottom-0 rounded-start text-center" width="5%">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0" width="25%">
                                    <h6 class="fw-semibold mb-0">Nama Kategori</h6>
                                </th>
                                <th class="border-bottom-0" width="55%">
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
                                <td class="border-bottom-0 text-center">
                                    <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1 text-dark">{{ $kategori->nama }}</h6>
                                </td>
                                <td class="border-bottom-0 text-wrap">
                                    <span class="text-muted fs-3" style="line-height: 1.5;">{{ $kategori->deskripsi ?? 'Tidak ada deskripsi' }}</span>
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
                                <td colspan="4" class="text-center py-5 border-bottom-0">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <i class="ti ti-folder-x text-muted mb-3" style="font-size: 3rem;"></i>
                                        <h6 class="text-muted fw-normal mb-0">Belum ada data kategori yang ditambahkan.</h6>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection