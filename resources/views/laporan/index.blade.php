@extends('layouts.master')
@section('title', 'Pusat Laporan')

@section('content')
<div class="row">
    <div class="col-12">
        
        <div class="card border-0 shadow-sm rounded-4 w-100 p-2 mb-4 d-print-none">
            <div class="card-body">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="ti ti-report fs-6"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-0">Generator Laporan Sistem</h5>
                </div>

                <form action="{{ route('laporan.index') }}" method="GET" class="row align-items-end">
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="form-label fw-semibold">Pilih Jenis Laporan</label>
                        <select name="jenis" class="form-select rounded-3" onchange="this.form.submit()">
                            <option value="tanaman" {{ request('jenis') == 'tanaman' ? 'selected' : '' }}>Inventaris Tanaman</option>
                            <option value="event" {{ request('jenis') == 'event' ? 'selected' : '' }}>Jadwal Event</option>
                        </select>
                    </div>

                    @if(request('jenis') == 'event')
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="form-label fw-semibold">Dari Tanggal</label>
                        <input type="date" name="tgl_awal" class="form-control rounded-3" value="{{ request('tgl_awal') }}">
                    </div>
                    <div class="col-md-3 mb-3 mb-md-0">
                        <label class="form-label fw-semibold">Sampai Tanggal</label>
                        <input type="date" name="tgl_akhir" class="form-control rounded-3" value="{{ request('tgl_akhir') }}">
                    </div>
                    @endif

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary rounded-pill w-100 fw-semibold shadow-sm">
                            <i class="ti ti-filter me-1"></i> Filter Data
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 w-100" id="area-print">
            <div class="card-body p-5">
                
                <div class="text-end mb-4 d-print-none">
                    <button onclick="window.print()" class="btn btn-success rounded-pill px-4 fw-semibold shadow-sm">
                        <i class="ti ti-printer me-2"></i> Cetak Dokumen PDF
                    </button>
                </div>

                <div class="text-center border-bottom border-dark mb-4 pb-3" style="border-bottom-width: 3px !important;">
                    <h3 class="fw-bold mb-1 text-uppercase text-dark" style="letter-spacing: 1px;">SMK Negeri 1 Air Putih</h3>
                    <h5 class="fw-bold mb-2 text-dark">PROGRAM KEAHLIAN REKAYASA PERANGKAT LUNAK</h5>
                    <p class="mb-0 text-dark" style="font-size: 14px;">Sistem Informasi Manajemen Inventaris KebunKu & Penjadwalan</p>
                </div>

                <div class="text-center mb-4">
                    <h4 class="fw-bold text-dark text-decoration-underline">
                        LAPORAN {{ request('jenis') == 'event' ? 'JADWAL EVENT / KEGIATAN' : 'INVENTARIS TANAMAN' }}
                    </h4>
                    @if(request('jenis') == 'event' && request('tgl_awal') && request('tgl_akhir'))
                        <p class="text-dark">Periode: {{ \Carbon\Carbon::parse(request('tgl_awal'))->format('d M Y') }} s.d {{ \Carbon\Carbon::parse(request('tgl_akhir'))->format('d M Y') }}</p>
                    @endif
                </div>

                @if($jenis == 'tanaman')
                    <table class="table table-bordered border-dark align-middle">
                        <thead class="bg-light text-dark text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Tanaman</th>
                                <th>Kategori</th>
                                <th>Tanggal Tanam</th>
                                <th>Lokasi</th>
                                <th>Kondisi</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @forelse($plants as $index => $plant)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $plant->nama_tanaman }}</td>
                                <td>{{ $plant->kategori->nama ?? '-' }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($plant->tgl_tanam)->format('d/m/Y') }}</td>
                                <td>{{ $plant->lokasi }}</td>
                                <td class="text-center">{{ $plant->kondisi }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">Tidak ada data tanaman.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif

                @if($jenis == 'event')
                    <table class="table table-bordered border-dark align-middle">
                        <thead class="bg-light text-dark text-center">
                            <tr>
                                <th width="5%">No</th>
                                <th width="20%">Tanggal</th>
                                <th width="25%">Tanaman Terkait</th>
                                <th width="15%">Tipe</th>
                                <th width="35%">Keterangan Kegiatan</th>
                            </tr>
                        </thead>
                        <tbody class="text-dark">
                            @forelse($events as $index => $event)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($event->tgl_event)->format('d F Y') }}</td>
                                <td class="fw-semibold">{{ $event->plant->nama_tanaman ?? 'Dihapus' }}</td>
                                <td class="text-center">{{ $event->tipe_event == 'I' ? 'Indoor' : 'Outdoor' }}</td>
                                <td>{{ $event->keterangan ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">Tidak ada data event pada periode ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                @endif

                <div class="row mt-1 pt-4 text-dark">
                    <div class="col-8"></div>
                    <div class="col-4 text-left">
                        <p class="mb-5">Air Putih, {{ \Carbon\Carbon::now()->format('d F Y') }}<br>Penanggung Jawab,</p>
                        <br><br>
                        <p class="fw-bold mb-0 text-decoration-underline">ARYO PRATAMA, S.Kom</p>
                        <p>NIP. ................................................</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<style>
    @media print {
        /* Sembunyikan semua elemen di layar utama */
        body * {
            visibility: hidden;
        }
        /* Hanya tampilkan elemen yang ada di dalam id="area-print" */
        #area-print, #area-print * {
            visibility: visible;
        }
        /* Posisikan Kertas Laporan agar mengambil alih seluruh layar PDF */
        #area-print {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            margin: 0;
            padding: 0;
            box-shadow: none !important;
        }
        /* Hilangkan elemen spesifik (seperti tombol cetak) di dalam kertas */
        .d-print-none {
            display: none !important;
        }
        /* Pastikan warna border tabel tercetak hitam tebal */
        .table-bordered {
            border-color: #000 !important;
        }
        .table-bordered th, .table-bordered td {
            border-color: #000 !important;
        }
    }
</style>
@endsection