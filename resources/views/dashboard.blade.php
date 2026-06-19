@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-sm-6 col-xl-3 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="text-primary" style="font-size: 3.5rem;"></iconify-icon>
                <div>
                    <p class="mb-1 text-muted fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">Total Kategori</p>
                    <h4 class="fw-bold mb-0 text-dark">{{ $totalKategori }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <iconify-icon icon="solar:sticker-smile-circle-2-bold-duotone" class="text-success" style="font-size: 3.5rem;"></iconify-icon>
                <div>
                    <p class="mb-1 text-muted fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">Total Tanaman</p>
                    <h4 class="fw-bold mb-0 text-dark">{{ $totalPlant }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="text-info" style="font-size: 3.5rem;"></iconify-icon>
                <div>
                    <p class="mb-1 text-muted fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">Total Event</p>
                    <h4 class="fw-bold mb-0 text-dark">{{ $totalEvent }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body d-flex align-items-center gap-3 p-4">
                <iconify-icon icon="solar:danger-triangle-bold-duotone" class="text-danger" style="font-size: 3.5rem;"></iconify-icon>
                <div>
                    <p class="mb-1 text-muted fw-semibold text-uppercase" style="font-size: 0.8rem; letter-spacing: 0.5px;">Perlu Perhatian</p>
                    <h4 class="fw-bold mb-0 text-dark">{{ $totalPerluPerhatian }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h5 class="card-title fw-bold mb-4 text-dark">Distribusi Tanaman per Kategori</h5>
                <canvas id="chartKategori" height="220"></canvas>
                <div class="table-responsive mt-4 border rounded-3">
                    <table class="table table-hover table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-3">Kategori</th>
                                <th class="py-3 px-3 text-end">Jumlah Tanaman</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @forelse ($tanamanPerKategori as $kategori)
                            <tr>
                                <td class="py-2 px-3 fw-medium text-dark">{{ $kategori->nama }}</td>
                                <td class="py-2 px-3 text-end fw-bold text-primary">{{ $kategori->plants_count }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-4">Belum ada data kategori.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h5 class="card-title fw-bold mb-4 text-dark">Distribusi Kondisi Tanaman</h5>
                <canvas id="chartKondisi" height="220"></canvas>
                <div class="table-responsive mt-4 border rounded-3">
                    <table class="table table-hover table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-3">Kondisi</th>
                                <th class="py-3 px-3 text-end">Jumlah Tanaman</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @foreach ($tanamanPerKondisi as $kondisi => $jumlah)
                            <tr>
                                <td class="py-2 px-3 fw-medium text-dark">{{ $kondisi }}</td>
                                <td class="py-2 px-3 text-end fw-bold text-primary">{{ $jumlah }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h5 class="card-title fw-bold mb-4 text-dark">Tanaman Perlu Perhatian</h5>
                <div class="table-responsive border rounded-3">
                    <table class="table table-hover table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-3">Nama Tanaman</th>
                                <th class="py-3 px-2">Kategori</th>
                                <th class="py-3 px-2 text-center">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @forelse ($tanamanPerluPerhatian as $plant)
                            <tr>
                                <td class="py-2 px-3 fw-bold text-dark">{{ $plant->nama_tanaman }}</td>
                                <td class="py-2 px-2 text-muted">{{ $plant->kategori->nama ?? '-' }}</td>
                                <td class="py-2 px-2 text-center">
                                    <span class="badge {{ $plant->kondisi === 'Sakit' ? 'bg-label-danger text-danger' : 'bg-label-warning text-warning' }} px-3 py-2 rounded-pill fw-semibold">
                                        {{ $plant->kondisi }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-success fw-medium py-5">
                                    <i class="bx bx-check-circle fs-3 mb-2 d-block"></i>
                                    Semua tanaman dalam kondisi sehat!
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h5 class="card-title fw-bold mb-4 text-dark">Event Terbaru</h5>
                <div class="table-responsive border rounded-3">
                    <table class="table table-hover table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-3">Tanggal</th>
                                <th class="py-3 px-2">Tipe Event</th>
                                <th class="py-3 px-2">Tanaman</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @forelse ($eventTerbaru as $event)
                            <tr>
                                <td class="py-2 px-3 text-muted">
                                    <i class="bx bx-calendar me-1"></i> {{ \Carbon\Carbon::parse($event->tgl_event)->format('d/m/Y') }}
                                </td>
                                
                                <td class="py-2 px-2 fw-bold text-primary">{{ $event->tipe_event === 'I' ? 'Indoor' : 'Outdoor' }}</td>
                                <td class="py-2 px-2 text-dark">{{ $event->plant->nama_tanaman ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">
                                    <i class="bx bx-calendar-x fs-3 mb-2 d-block"></i>
                                    Belum ada data event.
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

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const kategoriLabels = @json($tanamanPerKategori->pluck('nama'));
    const kategoriData = @json($tanamanPerKategori->pluck('plants_count'));

    new Chart(document.getElementById('chartKategori'), {
        type: 'bar',
        data: {
            labels: kategoriLabels,
            datasets: [{
                label: 'Jumlah Tanaman',
                data: kategoriData,
                backgroundColor: '#696cff',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
        }
    });

    const kondisiLabels = @json($tanamanPerKondisi->keys());
    const kondisiData = @json($tanamanPerKondisi->values());

    new Chart(document.getElementById('chartKondisi'), {
        type: 'doughnut',
        data: {
            labels: kondisiLabels,
            datasets: [{
                data: kondisiData,
                backgroundColor: ['#71dd37', '#ffab00', '#ff3e1d'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            cutout: '75%',
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
});
</script>
@endsection