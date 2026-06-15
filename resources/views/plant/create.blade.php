@extends('layouts.master')
@section('title', 'Tambah Data Tanaman')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 shadow-sm rounded-4 w-100">
            <div class="card-body p-4 p-md-5">

                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="ti ti-plus fs-6"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-0">Registrasi Tanaman Baru</h5>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0 text-dark">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('plant.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-dark">Nama Tanaman <span class="text-danger">*</span></label>
                            <input type="text" name="nama_tanaman" class="form-control rounded-3" value="{{ old('nama_tanaman') }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-dark">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori_id" class="form-select rounded-3" required>
                                <option value="" selected disabled>-- Pilih Kategori --</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-dark">Tanggal Tanam <span class="text-danger">*</span></label>
                            <input type="date" name="tgl_tanam" class="form-control rounded-3" value="{{ old('tgl_tanam') }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold text-dark">Kondisi <span class="text-danger">*</span></label>
                            <select name="kondisi" class="form-select rounded-3" required>
                                <option value="Sehat" {{ old('kondisi') == 'Sehat' ? 'selected' : '' }}>Sehat</option>
                                <option value="Kurang Sehat" {{ old('kondisi') == 'Kurang Sehat' ? 'selected' : '' }}>Kurang Sehat</option>
                                <option value="Sakit" {{ old('kondisi') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">Lokasi Penanaman <span class="text-danger">*</span></label>
                        <input type="text" name="lokasi" class="form-control rounded-3" value="{{ old('lokasi') }}" placeholder="Contoh: Halaman Depan, Polybag 1" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">Upload Foto</label>
                        <input type="file" name="foto" class="form-control rounded-3" accept="image/*">
                        <div class="form-text text-muted mt-1">Format: JPG, PNG. Maksimal 2MB.</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-dark">Catatan Tambahan</label>
                        <textarea name="catatan" class="form-control rounded-3" rows="3">{{ old('catatan') }}</textarea>
                    </div>

                    <div class="d-flex gap-2 pt-3 border-top mt-4">
                        <button type="submit" class="btn btn-primary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold shadow-sm">
                            <i class="ti ti-device-floppy fs-5"></i> Simpan Data
                        </button>
                        <a href="{{ route('plant.index') }}" class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold">
                            <i class="ti ti-arrow-left fs-5"></i> Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection