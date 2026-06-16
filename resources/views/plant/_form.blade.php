<div class="row">
    
    <div class="col-lg-4 mb-4 mb-lg-0">
        <div class="p-4 border border-light-subtle rounded-4 bg-light h-100 d-flex flex-column shadow-none">
            <label class="form-label fw-bold text-dark mb-3">Foto Tanaman</label>
            
            @if(!empty($plant->foto))
                <div class="mb-3 text-center flex-grow-1 d-flex flex-column justify-content-center">
                    <img src="{{ asset('storage/fotos/' . $plant->foto) }}" class="rounded-3 shadow-sm border w-100 bg-white p-1" style="object-fit: cover; max-height: 250px;" alt="Foto Saat Ini">
                </div>
                <label class="form-label fw-semibold text-dark fs-3 mt-auto">Ganti Foto (Opsional)</label>
            @else
                <div class="mb-3 text-center flex-grow-1 d-flex flex-column justify-content-center align-items-center bg-white rounded-3 p-4" style="border: 2px dashed #dee2e6;">
                    <i class="ti ti-photo text-muted mb-2" style="font-size: 3rem;"></i>
                    <span class="text-muted fs-3">Belum ada foto</span>
                </div>
                <label class="form-label fw-semibold text-dark fs-3 mt-auto">Unggah Foto Baru</label>
            @endif
            
            <input type="file" name="foto" class="form-control rounded-3 form-control-sm @error('foto') is-invalid @enderror" accept="image/*">
            
            <div class="form-text text-muted mt-2" style="font-size: 0.75rem;">
                Format file: JPG, PNG. Max: 2MB.
            </div>
            @error('foto') <small class="text-danger mt-1 d-block">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="col-lg-8">
        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold text-dark">Nama Tanaman <span class="text-danger">*</span></label>
                <input type="text" name="nama_tanaman" class="form-control rounded-3 @error('nama_tanaman') is-invalid @enderror" value="{{ old('nama_tanaman', $plant->nama_tanaman ?? '') }}" required>
                @error('nama_tanaman') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold text-dark">Kategori <span class="text-danger">*</span></label>
                <select name="kategori_id" class="form-select rounded-3 @error('kategori_id') is-invalid @enderror" required>
                    <option value="" selected disabled>-- Pilih Kategori --</option>
                    @foreach($kategoris as $k)
                        <option value="{{ $k->id }}" {{ (old('kategori_id', $plant->kategori_id ?? '') == $k->id) ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold text-dark">Tanggal Tanam <span class="text-danger">*</span></label>
                <input type="date" name="tgl_tanam" class="form-control rounded-3 @error('tgl_tanam') is-invalid @enderror" value="{{ old('tgl_tanam', $plant->tgl_tanam ?? '') }}" required>
                @error('tgl_tanam') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="col-md-6 mb-4">
                <label class="form-label fw-semibold text-dark">Kondisi <span class="text-danger">*</span></label>
                <select name="kondisi" class="form-select rounded-3 @error('kondisi') is-invalid @enderror" required>
                    @foreach(['Sehat', 'Kurang Sehat', 'Sakit'] as $kondisi)
                        <option value="{{ $kondisi }}" {{ (old('kondisi', $plant->kondisi ?? 'Sehat') == $kondisi) ? 'selected' : '' }}>
                            {{ $kondisi }}
                        </option>
                    @endforeach
                </select>
                @error('kondisi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold text-dark">Lokasi Penanaman <span class="text-danger">*</span></label>
            <input type="text" name="lokasi" class="form-control rounded-3 @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $plant->lokasi ?? '') }}" required>
            @error('lokasi') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-0"> <label class="form-label fw-semibold text-dark">Catatan Tambahan</label>
            <textarea name="catatan" class="form-control rounded-3 @error('catatan') is-invalid @enderror" rows="4">{{ old('catatan', $plant->catatan ?? '') }}</textarea>
            @error('catatan') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>
</div>