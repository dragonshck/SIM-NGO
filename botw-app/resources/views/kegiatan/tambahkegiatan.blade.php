@extends('main')
@section('formtambahkegiatan')
<form method="POST" action="/insert-kegiatan">
  @csrf
<div class="card mb-3">
    <div class="card-body">
      <div class="row flex-between-center">
        <div class="col-md">
          <h5 class="mb-2 mb-md-0">Buat Kegiatan</h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-falcon-default btn-sm me-2" role="button" type="submit">Save</button>
        </div>
      </div>
    </div>
  </div>
  <div class="card cover-image mb-3"><img class="card-img-top" src="{{ asset('falcon-style/public/assets/img/generic/13.jpg') }}" alt="">
    <input class="d-none" id="upload-cover-image" type="file" name="gambar_event">
    <label class="cover-image-file-input" for="upload-cover-image"><svg class="svg-inline--fa fa-camera fa-w-16 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path></svg><!-- <span class="fas fa-camera me-2"></span> Font Awesome fontawesome.com --><span>Change cover photo</span></label>
  </div>
  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0">Event Details</h5>
        </div>
        <div class="card-body bg-light">
          <form>
            <div class="row gx-2">
              <div class="col-12 mb-3">
                <label class="form-label" for="event-name">Event Title</label>
                <input class="form-control" id="event-name" type="text" placeholder="Event Title" name="judul_kegiatan">
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="start-date">Start Date</label>
                <input class="form-control datetimepicker flatpickr-input" id="start-date" name="tgl_mulai" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="start-time">Start Time</label>
                <input class="form-control datetimepicker flatpickr-input" id="start-time" name="jam_mulai" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="end-date">End Date</label>
                <input class="form-control datetimepicker flatpickr-input" id="end-date" name="tgl_selesai" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d/m/y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="end-time">End Time</label>
                <input class="form-control datetimepicker flatpickr-input" id="end-time" name="jam_selesai" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
              </div>
              
              <div class="col-12">
                <div class="border-dashed-bottom my-3"></div>
              </div>
              <div class="col-sm-12 mb-3">
                <label class="form-label" for="event-venue">Venue</label>
                <input class="form-control" id="event-venue" type="text" placeholder="Venue" name="tempat_pelaksanaan">
              </div>
              <div class="col-12">
                <label class="form-label" for="event-description">Description</label>
                <textarea class="form-control" id="event-description" rows="6" name="keterangan_event"></textarea>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-4 ps-lg-2">
      <div class="sticky-sidebar">
        <div class="card mb-lg-0">
            <div class="card-header">
              <h5 class="mb-0">Other Info</h5>
            </div>
            <div class="card-body bg-light">
              <div class="mb-3">
                <label class="form-label" for="event-type">Event Type</label>
                <select class="form-select" id="event-type" name="tipe_kegiatan">
                  <option>Select event type...</option>
                  <option>Seminar</option>
                  <option>Fellowship</option>
                  <option>Pemeriksaan Kesehatan</option>
                  <option>Study Tour</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="event-type">Kelompok Umur</label>
                <select class="form-select" id="event-type" name="ku_id">
                  <option>Pilih Kelompok Umur...</option>
                  @foreach ($data_ku as $item)
                    <option value="{{ $item -> id }}">{{ $item -> nama_ku }}</option>
                  @endforeach
                </select>
              </div>
              <div class="border-dashed-bottom my-3"></div>
              <h6>Warning! Pastikan semua informasi yang dimasukkan sudah benar!</h6>
            </div>
          </div>
      </div>
    </div>
  </div>
</form>
@endsection