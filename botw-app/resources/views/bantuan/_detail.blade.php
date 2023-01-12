@extends('main')
@section('detailbantuan')
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('falcon-style/public/assets/img/icons/spot-illustrations/corner-4.png')}});opacity: 0.7;">
    </div>
    <!--/.bg-holder-->
    <div class="card-body position-relative">
      <h5>Pengeluaran Rewards Anak: {{ $collection -> id }}</h5>
      <p class="fs--1">{{ $collection -> updated_at }}</p>
      <div><strong class="me-2">Status: </strong>
        {{-- <div class="badge rounded-pill {{ ($collection -> status_transaksi == 1) ? 'badge-soft-success' : 'badge-soft-warning' }} fs--2">{{ ($collection -> status_transaksi == 1) ? 'Complete' : 'Pending' }}</div> --}}
      </div>
    </div>
  </div>

    <div class="card mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <h5 class="mb-3 fs-0">Detail Pengeluaran Bantuan</h5>
            <h6 class="mb-2">{{ $collection -> amount }}</h6>
            <p class="mb-1 fs--1">{{ $collection -> nama_transaksi }}</p>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <h5 class="mb-3 fs-0">Detail Barang</h5>
            <h6 class="mb-2">{{ $collection -> keterangan }}</h6>
            <p class="mb-0 fs--1">{{ $collection_anak -> homeaddr }}</p>
            <div class="text-500 fs--1">(Free Shipping)</div>
          </div>
          <div class="col-md-6 col-lg-4">
            <h5 class="mb-3 fs-0">Penerima</h5>
            <div class="d-flex">
                {{-- <img class="me-3" src="{{ asset('fotoanak/'.$collection_anak -> fotoprofil)}}" width="40" alt=""> --}}
              <div class="flex-1">
                <h6 class="mb-0">{{ $collection_anak -> kode_ku }}</h6>
                <p class="mb-0 fs--1">{{ $collection_anak -> nama_ku }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="card mb-3 mb-lg-0">
      <div class="card-header bg-light">
        <h5 class="mb-0">Bukti Penerimaan Hadiah</h5>
      </div>
      <div class="card-body overflow-hidden">
        <div class="row mx-n1">
            @foreach ($bukti_foto as $item)
            <div class="col-4 p-1">
              <a class="post1" href="{{ asset('helpergift_images/'.$item -> image)}}" data-gallery="gallery-1">
              <img class="img-fluid rounded" src="{{ asset('helpergift_images/'.$item -> image)}}" alt="..."></a>
            </div>
            @endforeach
        </div>
      </div>
    </div>
@endsection