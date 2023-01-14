@extends('main')

@section('daftarkunjunganlist')
<div class="card mb-3 mb-lg-0">
    <div class="card-header bg-light d-flex justify-content-between">
      <h5 class="mb-0">Daftar Kunjungan Anak</h5>
      
      <div class="d-flex justify-content-end">
        {{-- <form>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected="selected">Select Category</option>
              <option>Belum Dikunjungi</option>
              <option>Sudah Dikunjungi</option>
            </select>
          </form> --}}
          <div class="mx-3">
            <a class="btn btn-falcon-default btn-sm" type="button" href="/form-kunjungan-anak">
                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Data
            </a>
          </div>
      </div>
    </div>
    <div class="card-body fs--1">
      <div class="row">
        <div class="col-md-6 h-100">
          <div class="d-flex btn-reveal-trigger">
            <div class="calendar"><span class="calendar-month">Mar</span><span class="calendar-day">26</span></div>
            <div class="flex-1 position-relative ps-3">
              <h6 class="fs-0 mb-0"><a href="../../app/events/event-detail.html">Kunjungan dan Doa Dukungan Keluarga<span class="badge badge-soft-success rounded-pill">0 days ago</span></a></h6>
              <p class="mb-1">Untuk <a href="#!" class="text-700">Robinson</a></p>
              <p class="text-1000 mb-0">Time: 11:00AM</p>
              <p class="text-1000 mb-0">Duration: Feb 29 - Mar 2</p>The Liberty Warehouse, New Yourk
              <div class="border-dashed-bottom my-3"></div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </div>
@endsection