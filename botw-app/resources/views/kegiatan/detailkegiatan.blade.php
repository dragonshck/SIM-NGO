@extends('layouts.main')
@section('detailkegiatan')
<div class="card mb-3">
    <img class="card-img-top" src="{{ asset('posterevent/' . $collection -> gambar_event) }}" alt="">
    <div class="card-body">
      <div class="row justify-content-between align-items-center">
        <div class="col">
          <div class="d-flex">
            <div class="calendar me-2"><span class="calendar-month">{{ $bulanbang }}</span><span class="calendar-day">{{ $tanggalbang }}</span></div>
            <div class="flex-1 fs--1">
              <h5 class="fs-0">{{ $collection -> judul_kegiatan }}</h5>
              <p class="mb-0">by <a href="#!">PPA Kalvari</a></p><span class="fs-0 text-warning fw-semi-bold"></span>
            </div>
          </div>
        </div>
        <div class="col-md-auto mt-4 mt-md-0">
          {{-- <button class="btn btn-falcon-primary btn-sm px-4 px-sm-5" type="button">Register</button> --}}
        </div>
      </div>
    </div>
  </div>

  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
      <div class="card mb-3 mb-lg-0">
        <div class="card-body">
          <h5 class="fs-0 mb-3">{{ $collection -> judul_kegiatan }}</h5>
          <p>{{ $collection -> keterangan_event }}</p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-3 fs--1">
          <div class="card-body">
            <h6>Date And Time</h6>
            <p class="mb-1">{{ $startdate }}, {{ $starthour }} – <br>{{ $enddate }}, {{ $endhour }} WIB</p>
            <h6 class="mt-4">Location</h6>
            <div class="mb-1">{{ $collection -> tempat_pelaksanaan }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection