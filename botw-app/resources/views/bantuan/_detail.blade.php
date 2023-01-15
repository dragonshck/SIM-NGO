@extends('layouts.main')
@section('detailbantuan')
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('falcon-style/public/assets/img/icons/spot-illustrations/corner-4.png')}});opacity: 0.7;">
    </div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
      <h5>Pengeluaran Rewards Anak: {{ $collection -> id }}</h5>
      <p class="fs--1">{{  \Carbon\Carbon::parse($collection -> updated_at)->format('j F, Y') }}</p>
      <div><strong class="me-2">
        Status:
        <br></br>
        @if($collection-> status_trxbantuan == 1)
                <span class="badge badge rounded-pill d-block p-2 badge-soft-success">Completed<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                @else
                <span class="badge badge rounded-pill d-block p-2 badge-soft-warning">Process<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                @endif
      </strong>
        {{-- <div class="badge rounded-pill {{ ($collection -> status_transaksi == 1) ? 'badge-soft-success' : 'badge-soft-warning' }} fs--2">{{ ($collection -> status_transaksi == 1) ? 'Complete' : 'Pending' }}</div> --}}
      </div>
    </div>
  </div>

    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <h5 class="mb-3 fs-0">Detail Pengeluaran Bantuan</h5>
            <h6 class="mb-2">@currency($collection -> amount_bantuan)</h6>
            <p class="mb-1 fs--1">{{ $collection -> nama_bantuan }}</p>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <h5 class="mb-3 fs-0">Detail Barang</h5>
            <h6 class="mb-2">{{ $collection -> keterangan }}</h6>
            <p class="mb-0 fs--1">{{ $collection -> kelompokumurz -> ku_description }}</p>
            <div class="text-500 fs--1"></div>
          </div>
          {{-- <div class="col-md-6 col-lg-4">
            <h5 class="mb-3 fs-0">Penerima</h5>
            <div class="d-flex">
                <img class="me-3" src="{{ asset('fotoanak/'.$collection_anak -> fotoprofil)}}" width="40" alt="">
              <div class="flex-1">
                <h6 class="mb-0"></h6>
                <p class="mb-0 fs--1"></p>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  
    <div class="card mb-3 mb-lg-0">
      <div class="card-header bg-light">
        <h5 class="mb-0">Foto Bantuan</h5>
      </div>
      <div class="card-body overflow-hidden">
        <div class="row mx-n1">
            <div class="col-4 p-1">
              <a class="post1" href="{{ asset('images/transaction/'.$collection -> lampiran_bantuan)}}" data-gallery="gallery-1">
              <img class="img-fluid rounded" src="{{ asset('images/transaction/'.$collection -> lampiran_bantuan)}}" alt="..."></a>
            </div>
        </div>
      </div>
    </div>
@endsection