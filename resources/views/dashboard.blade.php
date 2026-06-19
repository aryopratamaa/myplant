@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<style>
    .hover-card {
        transition: all 0.3s ease-in-out;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.1) !important;
    }
    .icon-box {
        width: 65px;
        height: 65px;
        border-radius: 1.2rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 shadow-sm border-0 rounded-4 hover-card">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="icon-box bg-label-primary">
                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="text-primary" style="font-size: 2.5rem;"></iconify-icon>
                </div>
                <div>
                    <p class="mb-1 text-muted fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Kategori</p>
                    <h3 class="fw-bolder mb-0 text-dark">{{ $totalKategori }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 shadow-sm border-0 rounded-4 hover-card">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="icon-box bg-label-success">
                    <iconify-icon icon="solar:sticker-smile-circle-2-bold-duotone" class="text-success" style="font-size: 2.5rem;"></iconify-icon>
                </div>
                <div>
                    <p class="mb-1 text-muted fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Tanaman</p>
                    <h3 class="fw-bolder mb-0 text-dark">{{ $totalPlant }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 shadow-sm border-0 rounded-4 hover-card">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="icon-box bg-label-info">
                    <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="text-info" style="font-size: 2.5rem;"></iconify-icon>
                </div>
                <div>
                    <p class="mb-1 text-muted fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Event</p>
                    <h3 class="fw-bolder mb-0 text-dark">{{ $totalEvent }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card h-100 shadow-sm border-0 rounded-4 hover-card">
            <div class="card-body p-4 d-flex align-items-center gap-3">
                <div class="icon-box bg-label-danger">
                    <iconify-icon icon="solar:danger-triangle-bold-duotone" class="text-danger" style="font-size: 2.5rem;"></iconify-icon>
                </div>
                <div>
                    <p class="mb-1 text-muted fw-bold text-uppercase" style="font-size: 0.75rem; letter-spacing: 0.5px;">Perlu Perhatian</p>
                    <h3 class="fw-bolder mb-0 text-dark">{{ $totalPerluPerhatian }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom py-3 px-4">
                <h6 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-bar-chart-alt-2 fs-4 me-2 text-primary"></i> Distribusi Tanaman per Kategori
                </h6>
            </div>
            <div class="card-body p-4">
                <div class="mb-5">
                    <canvas id="chartKategori" height="220"></canvas>
                </div>
                <div class="table-responsive rounded-3 border">
                    <table class="table table-hover table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-4">Kategori</th>
                                <th class="py-3 px-4 text-end">Jumlah Tanaman</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($tanamanPerKategori as $kategori)
                            <tr>
                                <td class="py-2 px-4 fw-medium text-dark">{{ $kategori->nama }}</td>
                                <td class="py-2 px-4 text-end fw-bold text-primary">{{ $kategori->plants_count }}</td>
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

    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom py-3 px-4">
                <h6 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-pie-chart-alt-2 fs-4 me-2 text-success"></i> Distribusi Kondisi Tanaman
                </h6>
            </div>
            <div class="card-body p-4">
                <div class="mb-5 d-flex justify-content-center">
                    <div style="width: 100%; max-width: 300px;">
                        <canvas id="chartKondisi" height="220"></canvas>
                    </div>
                </div>
                <div class="table-responsive rounded-3 border">
                    <table class="table table-hover table-sm align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-4">Kondisi</th>
                                <th class="py-3 px-4 text-end">Jumlah Tanaman</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($tanamanPerKondisi as $kondisi => $jumlah)
                            <tr>
                                <td class="py-2 px-4 fw-medium text-dark">
                                    @if($kondisi === 'Sehat')
                                        <i class="bx bxs-circle text-success me-1 fs-6"></i>
                                    @elseif($kondisi === 'Kurang Sehat')
                                        <i class="bx bxs-circle text-warning me-1 fs-6"></i>
                                    @else
                                        <i class="bx bxs-circle text-danger me-1 fs-6"></i>
                                    @endif
                                    {{ $kondisi }}
                                </td>
                                <td class="py-2 px-4 text-end fw-bold text-dark">{{ $jumlah }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom py-3 px-4">
                <h6 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-error-circle fs-4 me-2 text-danger"></i> Tanaman Perlu Perhatian
                </h6>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-4">Nama Tanaman</th>
                                <th class="py-3 px-3">Kategori</th>
                                <th class="py-3 px-4 text-center">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($tanamanPerluPerhatian as $plant)
                            <tr>
                                <td class="py-3 px-4 fw-bold text-dark">{{ $plant->nama_tanaman }}</td>
                                <td class="py-3 px-3 text-muted">{{ $plant->kategori->nama ?? '-' }}</td>
                                <td class="py-3 px-4 text-center">
                                    <span class="badge {{ $plant->kondisi === 'Sakit' ? 'bg-label-danger' : 'bg-label-warning' }} rounded-pill px-3 py-1 fw-bold">
                                        {{ $plant->kondisi }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <i class="bx bx-check-shield text-success fs-1 mb-2 d-block"></i>
                                    <h6 class="text-dark fw-bold mb-0">Semua tanaman sehat!</h6>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card h-100 shadow-sm border-0 rounded-4">
            <div class="card-header bg-white border-bottom py-3 px-4">
                <h6 class="fw-bold text-dark mb-0 d-flex align-items-center">
                    <i class="bx bx-calendar-event fs-4 me-2 text-info"></i> Event Terbaru
                </h6>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive rounded-3 border">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 px-4">Tanggal</th>
                                <th class="py-3 px-3">Tipe Event</th>
                                <th class="py-3 px-4">Tanaman</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($eventTerbaru as $event)
                            <tr>
                                <td class="py-3 px-4 text-dark fw-medium">
                                    <i class="bx bx-calendar text-muted me-1"></i> {{ \Carbon\Carbon::parse($event->tgl_event)->format('d/m/Y') }}
                                </td>
                                <td class="py-3 px-3">
                                    @if($event->tipe_event === 'I')
                                        <span class="badge bg-label-info rounded-pill px-3 py-1 fw-bold">Indoor</span>
                                    @else
                                        <span class="badge bg-label-secondary rounded-pill px-3 py-1 fw-bold">Outdoor</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-dark">{{ $event->plant->nama_tanaman ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center py-5">
                                    <i class="bx bx-calendar-x text-muted fs-1 mb-2 d-block"></i>
                                    <h6 class="text-muted fw-bold mb-0">Belum ada data event.</h6>
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
                borderRadius: 6,
                barPercentage: 0.6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: { 
                y: { 
                    beginAtZero: true, 
                    ticks: { precision: 0 },
                    grid: { borderDash: [5, 5] }
                },
                x: {
                    grid: { display: false }
                }
            }
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
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: {
                legend: { 
                    position: 'bottom',
                    labels: { padding: 20, usePointStyle: true }
                }
            }
        }
    });
});
</script>
@endsection