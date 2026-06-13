@extends('index')
@section('title', 'Data Event')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold text-dark mb-1">Manajemen Event & Kegiatan</h4>
        <p class="text-muted mb-0">Jadwal pameran, workshop, dan kegiatan penghijauan.</p>
    </div>
    <button class="btn btn-primary rounded-pill"><i class="ti ti-plus me-1"></i> Buat Event</button>
</div>

<div class="row">
    <!-- Event 1 -->
    <div class="col-md-4 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 overflow-hidden hover-card">
            <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top object-fit-cover" alt="Event" style="height: 180px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-primary-subtle text-primary rounded-pill fw-semibold">Pameran Flora</span>
                    <small class="text-muted fw-bold"><i class="ti ti-calendar-event me-1"></i> 24 Ags 2026</small>
                </div>
                <h5 class="fw-bold mb-2">Festival Tanaman Hias 2026</h5>
                <p class="text-muted fs-3 mb-4">Pameran dan bursa tanaman hias terbesar bulan ini. Dihadiri oleh 50+ pembudidaya lokal.</p>
                <div class="d-flex align-items-center justify-content-between">
                    <span class="text-dark fs-3"><i class="ti ti-map-pin text-danger me-1"></i> Lap. Astaka</span>
                    <a href="#" class="btn btn-sm btn-outline-primary rounded-pill px-3">Detail</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Event 2 -->
    <div class="col-md-4 mb-4 d-flex align-items-stretch">
        <div class="card border-0 shadow-sm rounded-4 w-100 overflow-hidden hover-card">
            <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="card-img-top object-fit-cover" alt="Event" style="height: 180px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="badge bg-success-subtle text-success rounded-pill fw-semibold">Workshop</span>
                    <small class="text-muted fw-bold"><i class="ti ti-calendar-event me-1"></i> 02 Sep 2026</small>
                </div>
                <h5 class="fw-bold mb-2">Pelatihan Hidroponik Modern</h5>
                <p class="text-muted fs-3 mb-4">Edukasi cara menanam sayuran hidroponik di lahan sempit untuk pemula dan komunitas.</p>
                <div class="d-flex align-items-center justify-content-between">
                    <span class="text-dark fs-3"><i class="ti ti-map-pin text-danger me-1"></i> Aula Utama</span>
                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    }
</style>
@endsection