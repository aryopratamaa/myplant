@extends('layouts.master')
@section('title', 'Tambah Kategori Baru')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 shadow-sm rounded-4 w-100">
            <div class="card-body p-4 p-md-5">

                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="ti ti-plus fs-6"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-0">Tambah Kategori Baru</h5>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                    <div class="d-flex align-items-center fw-semibold mb-2">
                        <i class="ti ti-alert-circle fs-5 me-2"></i>
                        Gagal Menyimpan Data
                    </div>
                    <ul class="mb-0 text-dark">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="nama" class="form-label fw-semibold text-dark">
                            Nama Kategori <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="nama" id="nama" class="form-control form-control-lg rounded-3 @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Contoh: Tanaman Obat" required>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label fw-semibold text-dark">Deskripsi Kategori</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control rounded-3 @error('deskripsi') is-invalid @enderror" rows="4" placeholder="Tuliskan keterangan singkat mengenai kategori ini...">{{ old('deskripsi') }}</textarea>
                        <div class="form-text text-muted mt-2">Boleh dikosongkan jika tidak ada deskripsi tambahan.</div>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top mt-4">
                        <button type="submit" class="btn btn-primary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold shadow-sm">
                            <i class="ti ti-device-floppy fs-5"></i> Simpan Data
                        </button>
                        <a href="{{ route('kategori.index') }}" class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold">
                            <i class="ti ti-arrow-left fs-5"></i> Kembali
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection