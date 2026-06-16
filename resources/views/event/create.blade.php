@extends('layouts.master')
@section('title', 'Jadwalkan Event Baru')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 shadow-sm rounded-4 w-100 p-2">
            <div class="card-body">

                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="ti ti-calendar-plus fs-6"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-0">Jadwalkan Event Baru</h5>
                </div>

                <form action="{{ route('event.store') }}" method="POST">
                    @csrf
                    
                    @include('event._form')

                    <div class="d-flex gap-2 pt-4 border-top mt-4 justify-content-end">
                        <a href="{{ route('event.index') }}" class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold">
                            <i class="ti ti-arrow-left fs-5"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-warning rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold shadow-sm text-dark">
                            <i class="ti ti-device-floppy fs-5"></i> Simpan Event
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection