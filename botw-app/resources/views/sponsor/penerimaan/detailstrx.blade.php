<link href="vendors/glightbox/glightbox.min.css" rel="stylesheet" />
<script src="vendors/glightbox/glightbox.min.js"></script>

@extends('layouts.main')

@section('detailpenerimaansponsor')
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png')}});opacity: 0.7;">
  </div>
  <!--/.bg-holder-->
  <div class="card-body position-relative">
    <h5>Penerimaan Hadiah Sponsor: {{ $data_sponsor -> id }}</h5>
    <p class="fs--1">{{ \Carbon\Carbon::parse($data_sponsor->updated_at)->format('j F, Y') }}</p>
    <div><strong class="me-2">Status: </strong>
      <div class="badge rounded-pill {{ ($data_sponsor -> status_hadiah == 1) ? 'badge-soft-success' : 'badge-soft-warning' }} fs--2">{{ ($data_sponsor -> status_hadiah == 1) ? 'Complete' : 'Pending' }}</div>
    </div>
  </div>
</div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <h5 class="mb-3 fs-0">Detail Penerimaan</h5>
          <h6 class="mb-2">@currency($data_sponsor -> amount_hadiah)</h6>
          <p class="mb-1 fs--1">{{ $data_sponsor -> nama_hadiah }}</p>
        </div>
        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
          <h5 class="mb-3 fs-0">Sponsor Pemberi</h5>
          <h6 class="mb-2">{{ $data_sponsor -> hadiahanak -> sponsor -> nama_sponsor }}</h6>
          <p class="mb-0 fs--1">{{ $data_sponsor -> hadiahanak -> sponsor -> origin_country }}</p>
          <div class="text-500 fs--1"></div>
        </div>
        <div class="col-md-6 col-lg-4">
          <h5 class="mb-3 fs-0">Penerima</h5> 
          <div class="d-flex"><img class="me-3" src="{{ asset('images/profile/'. $data_sponsor -> hadiahanak -> user -> profile_picture)}}" width="40" alt="">
            <div class="flex-1">
              <h6 class="mb-0">{{ $data_sponsor -> hadiahanak -> user -> name }}</h6>
              <p class="mb-0 fs--1">{{ $data_sponsor -> hadiahanak -> current_addr }}</p>
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
          <div class="col-4 p-1">
            <a class="post1" href="{{ asset('images/transaction/' . $data_sponsor -> lampiran_hadiah)}}" data-gallery="gallery-1">
            <img class="img-fluid rounded" src="{{ asset('images/transaction/'.$data_sponsor -> lampiran_hadiah)}}" alt="..."></a>
          </div>
      </div>
    </div>
  </div>


@endsection