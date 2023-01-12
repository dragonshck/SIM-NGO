@extends('main')

@section('listjadwalkegiatan')
<div class="card mb-3 mb-lg-0">
    <div class="card-header bg-light d-flex justify-content-between">
      <h5 class="mb-0">Events</h5>
      
      <div class="d-flex justify-content-end">
        <form>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected="selected">Select Category</option>
              <option>Seminar</option>
              <option>Fellowship</option>
              <option>Pemeriksaan Kesehatan</option>
              <option>Study Tour</option>
            </select>
          </form>
          <div class="mx-3">
            <a class="btn btn-falcon-default btn-sm" type="button" href="/tambah-kegiatan">
                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Kegiatan
            </a>
          </div>
      </div>
    </div>
    <div class="card-body fs--1">
      <div class="row">
        @foreach ($collection as $index => $item)
        <div class="col-md-6 h-100">
          <div class="d-flex btn-reveal-trigger">
            <div class="calendar"><span class="calendar-month">{{ $bulan[$index] }}</span><span class="calendar-day">{{ $tanggal[$index] }}</span></div>
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0"><a href="/kegiatan-ppa/{{ $item -> id }}">{{ $item -> judul_kegiatan }}<span class="badge badge-soft-success rounded-pill">{{ $countday[$index] }} days ago</span></a></h6>
              <p class="mb-1">Organized by <a href="#!" class="text-700">PPA Kalvari</a></p>
              <p class="text-1000 mb-0">Time: {{ $item -> jam_mulai }}</p>
              <p class="text-1000 mb-0">Duration: {{ $item -> tgl_mulai }} - {{ $item -> tgl_selesai }}</p>{{ $item -> tempat_pelaksanaan }}
              <div class="border-dashed-bottom my-3"></div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection