<link href="vendors/glightbox/glightbox.min.css" rel="stylesheet" />
<script src="vendors/glightbox/glightbox.min.js"></script>

@extends('main')

@section('detailpenerimaansponsor')
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('falcon-style/public/assets/img/icons/spot-illustrations/corner-4.png')}});opacity: 0.7;">
  </div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <h5>Penerimaan Hadiah Sponsor: {{ $collection -> id }}</h5>
    <p class="fs--1">{{ $collection -> updated_at }}</p>
    <div><strong class="me-2">Status: </strong>
      <div class="badge rounded-pill {{ ($collection -> status_transaksi == 1) ? 'badge-soft-success' : 'badge-soft-warning' }} fs--2">{{ ($collection -> status_transaksi == 1) ? 'Complete' : 'Pending' }}</div>
    </div>
  </div>
</div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <h5 class="mb-3 fs-0">Detail Penerimaan</h5>
          <h6 class="mb-2">{{ $collection -> total_harga }}</h6>
          <p class="mb-1 fs--1">{{ $collection -> namatransaksi }}</p>
          <p class="mb-0 fs--1"> <strong>Email: </strong><a href="mailto:ricky@gmail.com">antony@example.com</a></p>
          <p class="mb-0 fs--1"> <strong>Phone: </strong><a href="tel:7897987987">7897987987</a></p>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <h5 class="mb-3 fs-0">Detail Barang</h5>
          <h6 class="mb-2">{{ $collection -> barang_dibeli }}</h6>
          <p class="mb-0 fs--1">{{ $collection_anak -> homeaddr }}</p>
          <div class="text-500 fs--1">(Free Shipping)</div>
        </div>
        <div class="col-md-6 col-lg-4">
          <h5 class="mb-3 fs-0">Penerima</h5>
          <div class="d-flex"><img class="me-3" src="{{ asset('fotoanak/'.$collection_anak -> fotoprofil)}}" width="40" alt="">
            <div class="flex-1">
              <h6 class="mb-0">{{ $collection_anak -> fullname }}</h6>
              <p class="mb-0 fs--1">{{ $collection_anak -> phonenumbr }}</p>
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
            <a class="post1" href="{{ asset('sponsorgift_images/'.$item -> image)}}" data-gallery="gallery-1">
            <img class="img-fluid rounded" src="{{ asset('sponsorgift_images/'.$item -> image)}}" alt="..."></a>
          </div>
          @endforeach
      </div>
    </div>
  </div>


@endsection