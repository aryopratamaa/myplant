<div class="row">
    <div class="col-md-6 mb-4">
        <label class="form-label fw-semibold text-dark">Tanaman Terkait <span class="text-danger">*</span></label>
        <select name="plant_id" class="form-select rounded-3 @error('plant_id') is-invalid @enderror" required>
            <option value="" selected disabled>-- Pilih Tanaman --</option>
            @foreach($plants as $p)
                <option value="{{ $p->id }}" {{ (old('plant_id', $event->plant_id ?? '') == $p->id) ? 'selected' : '' }}>
                    {{ $p->nama_tanaman }}
                </option>
            @endforeach
        </select>
        @error('plant_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-4">
        <label class="form-label fw-semibold text-dark">Tipe Event <span class="text-danger">*</span></label>
        <select name="tipe_event" class="form-select rounded-3 @error('tipe_event') is-invalid @enderror" required>
            <option value="I" {{ (old('tipe_event', $event->tipe_event ?? 'I') == 'I') ? 'selected' : '' }}>Tipe I (Indoor / Masuk Ruangan)</option>
            <option value="O" {{ (old('tipe_event', $event->tipe_event ?? '') == 'O') ? 'selected' : '' }}>Tipe O (Outdoor / Keluar Ruangan)</option>
        </select>
        @error('tipe_event') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <label class="form-label fw-semibold text-dark">Tanggal Pelaksanaan <span class="text-danger">*</span></label>
        <input type="date" name="tgl_event" class="form-control rounded-3 @error('tgl_event') is-invalid @enderror" value="{{ old('tgl_event', $event->tgl_event ?? '') }}" required>
        @error('tgl_event') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="col-md-6 mb-4">
        <label class="form-label fw-semibold text-dark">Lokasi Event</label>
        <input type="text" name="lokasi" class="form-control rounded-3 @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $event->lokasi ?? '') }}" placeholder="Contoh: Lab Botani, Pameran Kota">
        @error('lokasi') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
</div>

<div class="mb-2">
    <label class="form-label fw-semibold text-dark">Keterangan / Agenda</label>
    <textarea name="keterangan" class="form-control rounded-3 @error('keterangan') is-invalid @enderror" rows="4" placeholder="Tuliskan rincian kegiatan event ini...">{{ old('keterangan', $event->keterangan ?? '') }}</textarea>
    @error('keterangan') <small class="text-danger">{{ $message }}</small> @enderror
</div>