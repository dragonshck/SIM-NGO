@extends('layouts.main')

@section('listjadwalkegiatan')
<div class="card mb-3 mb-lg-0">
    <div class="card-header bg-light d-flex justify-content-between">
      <h5 class="mb-0">Kegiatan PPA</h5>
      
      <div class="d-flex justify-content-end">
          <div class="mx-3">
            <a class="btn btn-falcon-default btn-sm" type="button" href="{{ route('kegiatanppa.create') }}">
                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Kegiatan
            </a>
          </div>
      </div>
    </div>
    <div class="card-body fs--1">
      <div class="row">
        @foreach ($events as $index => $item)
        <div class="col-md-6 h-100">
          <div class="d-flex btn-reveal-trigger">
            <div class="calendar"><span class="calendar-month">{{ $bulan[$index] }}</span><span class="calendar-day">{{ $tanggal[$index] }}</span></div>
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0">
                <a href="/kegiatanppa/{{ $item -> id }}/show"> {{ $item -> summary }}</a>
              </h6>
              <p class="mb-1">Organized by PPA Kalvari</p>
              <p class="text-1000 mb-0">Time: {{ $starthour[$index] }}</p>
              <p class="text-1000 mb-0">Duration: {{ $startdate[$index] }} - {{ $enddate[$index] }}</p>Place : {{ $item -> location }}
              <div style="float: right;">
                <a class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="/kegiatanppa/{{ $item -> id }}/edit"><span class="text-500 fas fa-edit"></span></a>
                <a class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="/kegiatanppa/{{ $item -> id }}/delete"><span class="text-500 fas fa-trash-alt"></span></a>
              </div>
              <div class="border-dashed-bottom my-3"></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection