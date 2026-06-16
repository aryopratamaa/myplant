@extends('layouts.master')
@section('title', 'Edit Jadwal Event')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 shadow-sm rounded-4 w-100 p-2">
            <div class="card-body">

                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="ti ti-pencil fs-6"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-0">Edit Jadwal Event</h5>
                </div>

                <form action="{{ route('event.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    @include('event._form')

                    <div class="d-flex gap-2 pt-4 border-top mt-4 justify-content-end">
                        <a href="{{ route('event.index') }}" class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold">
                            <i class="ti ti-arrow-left fs-5"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-info rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold shadow-sm text-white">
                            <i class="ti ti-device-floppy fs-5"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection