@extends('layouts.master')
@section('title', 'Manajemen Event')

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
                        <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                            <i class="ti ti-calendar-event fs-6"></i>
                        </div>
                        <h5 class="card-title fw-semibold mb-0">Manajemen Event Tanaman</h5>
                    </div>
                    <a href="{{ route('event.create') }}" class="btn btn-warning text-dark d-flex align-items-center gap-2 rounded-pill fw-semibold shadow-sm">
                        <i class="ti ti-plus fs-5"></i> Tambah Event
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle border-bottom mb-0">
                        <thead class="text-dark fs-4 bg-light">
                            <tr>
                                <th class="border-bottom-0 rounded-start text-center" width="5%"><h6 class="fw-semibold mb-0">No</h6></th>
                                <th class="border-bottom-0" width="25%"><h6 class="fw-semibold mb-0">Target Tanaman</h6></th>
                                <th class="border-bottom-0" width="20%"><h6 class="fw-semibold mb-0">Pelaksanaan</h6></th>
                                <th class="border-bottom-0" width="30%"><h6 class="fw-semibold mb-0">Keterangan (Ringkasan)</h6></th>
                                <th class="border-bottom-0 rounded-end text-center" width="20%"><h6 class="fw-semibold mb-0">Aksi</h6></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($events as $index => $event)
                            <tr>
                                <td class="border-bottom-0 text-center">
                                    <h6 class="fw-semibold mb-0">{{ $events->firstItem() + $index }}</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1 text-dark">{{ $event->plant->nama_tanaman ?? 'Tanaman Telah Dihapus' }}</h6>
                                    @if($event->tipe_event == 'I')
                                        <span class="badge bg-primary-subtle text-primary rounded-pill mt-1 px-2">Tipe I (Indoor)</span>
                                    @else
                                        <span class="badge bg-success-subtle text-success rounded-pill mt-1 px-2">Tipe O (Outdoor)</span>
                                    @endif
                                </td>
                                <td class="border-bottom-0">
                                    <span class="d-block text-dark fw-semibold mb-1"><i class="ti ti-calendar me-1"></i> {{ \Carbon\Carbon::parse($event->tgl_event)->format('d M Y') }}</span>
                                </td>
                                <td class="border-bottom-0 text-wrap">
                                    <span class="text-muted fs-3" style="line-height: 1.5;">{{ \Illuminate\Support\Str::limit($event->keterangan ?? 'Tidak ada keterangan', 50) }}</span>
                                </td>
                                <td class="border-bottom-0 text-center">
                                    <a href="{{ route('event.show', $event->id) }}" class="btn btn-sm btn-outline-primary rounded-circle p-2 me-1" title="Lihat Detail">
                                        <i class="ti ti-eye fs-4"></i>
                                    </a>
                                    <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-outline-info rounded-circle p-2 me-1" title="Edit Jadwal">
                                        <i class="ti ti-pencil fs-4"></i>
                                    </a>
                                    <form action="{{ route('event.destroy', $event->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal event ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle p-2" title="Hapus Jadwal">
                                            <i class="ti ti-trash fs-4"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 border-bottom-0">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <i class="ti ti-calendar-off text-muted mb-3" style="font-size: 3rem;"></i>
                                        <h6 class="text-muted fw-normal mb-0">Belum ada agenda event yang dijadwalkan.</h6>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($events->hasPages())
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 pt-3 border-top">
                    <div class="text-muted fs-3 mb-3 mb-md-0">
                        Menampilkan data <span class="fw-semibold text-dark">{{ $events->firstItem() }}</span> 
                        sampai <span class="fw-semibold text-dark">{{ $events->lastItem() }}</span> 
                        dari total <span class="fw-semibold text-dark">{{ $events->total() }}</span> event
                    </div>
                    <div class="pagination-wrapper">
                        {{ $events->links() }}
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<style>
    .pagination { margin-bottom: 0; }
    .page-item.active .page-link { background-color: var(--bs-warning); border-color: var(--bs-warning); color: var(--bs-dark); border-radius: 8px; }
    .page-link { color: var(--bs-dark); border: none; border-radius: 8px; margin: 0 2px; padding: 0.375rem 0.75rem; }
    .page-link:hover { background-color: var(--bs-light); color: var(--bs-warning); }
</style>
@endsection