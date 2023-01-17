@extends('layouts.main')

@section('tambahlogbookbaru')
<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png')}});">
    </div>
    <div class="card-body position-relative">
        <div class="row">
          <div class="col-lg-8">
            <h3>Romans 12:13</h3>
            <p class="mb-0">Contribute to the needs of the saints and seek to show hospitality.</p>
          </div>
        </div>
      </div>
</div>

  <div class="card mb-3">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0" data-anchor="data-anchor" id="example">Detail Logbook<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#example" style="padding-left: 0.375em;"></a></h5>
        </div>
      </div>
    </div>
    <form action="{{ route ('logbook.store') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="card-body bg-light">
      <div class="tab-content">
        
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlInput1">Judul Logbook</label>
            <input class="form-control" id="exampleFormControlInput1" name="judul_logbook">
          </div>
          <div class="mb-3">
            <label class="form-label" for="exampleFormControlTextarea1">Isi Logbook</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="isi_logbook"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label" for="customFile">Lampiran Kegiatan </label>
            <input class="form-control" id="customFile" type="file" name="lampiran_kegiatan"/>
          </div>
        <button class="btn btn-primary me-1 mb-1" type="submit">Tambah Logbook
        </button>
      </div>
    </div>
</form>
  </div>
@endsection