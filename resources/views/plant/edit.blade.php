@extends('layouts.master')
@section('title', 'Edit Data Tanaman')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <div class="card border-0 shadow-sm rounded-4 w-100 p-2">
            <div class="card-body">

                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                        <i class="ti ti-pencil fs-6"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-0">Edit Data Tanaman</h5>
                </div>

                <form action="{{ route('plant.update', $plant->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    @include('plant._form')

                    <div class="d-flex gap-2 pt-4 border-top mt-4 justify-content-end">
                        <a href="{{ route('plant.index') }}" class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold">
                            <i class="ti ti-arrow-left fs-5"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary rounded-pill d-flex align-items-center gap-2 px-4 fw-semibold shadow-sm">
                            <i class="ti ti-device-floppy fs-5"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection