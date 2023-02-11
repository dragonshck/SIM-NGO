@extends('layouts.main')
@section('formtambahkegiatan')
<form method="POST" action="{{ route('kegiatanppa.store') }}">
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
  <div class="card cover-image mb-3"><img class="card-img-top" src="{{ asset('falcon/public/assets/img/generic/13.jpg') }}" alt="">
    <input class="d-none" id="upload-cover-image" type="file" name="gambar_event">
    <label class="cover-image-file-input" for="upload-cover-image"><svg class="svg-inline--fa fa-camera fa-w-16 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path></svg><!-- <span class="fas fa-camera me-2"></span> Font Awesome fontawesome.com --><span>Change cover photo</span></label>
  </div>
  <div class="row g-0">
    <div class="col-lg-12 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0">Detail Kegiatan</h5>
        </div>
        <div class="card-body bg-light">
            
            <div class="row gx-2">
              <div class="col-12 mb-3">
                <label class="form-label" for="event-name">Judul Kegiatan</label>
                <input class="form-control" id="event-name" type="text" placeholder="Event Title" name="judul_kegiatan">
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="start-date">Tanggal Mulai</label>
                <input class="form-control datetimepicker flatpickr-input" id="start-date" name="tgl_mulai" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d-m-Y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="start-time">Waktu Mulai</label>
                <input class="form-control datetimepicker flatpickr-input" id="start-time" name="jam_mulai" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="end-date">Tanggal Selesai</label>
                <input class="form-control datetimepicker flatpickr-input" id="end-date" name="tgl_selesai" type="text" placeholder="d/m/y" data-options="{&quot;dateFormat&quot;:&quot;d-m-Y&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
              </div>
              <div class="col-sm-6 mb-3">
                <label class="form-label" for="end-time">Waktu Selesai</label>
                <input class="form-control datetimepicker flatpickr-input" id="end-time" name="jam_selesai" type="text" placeholder="H:i" data-options="{&quot;enableTime&quot;:true,&quot;noCalendar&quot;:true,&quot;dateFormat&quot;:&quot;H:i&quot;,&quot;disableMobile&quot;:true}" readonly="readonly">
              </div>
              
              <div class="col-12">
                <div class="border-dashed-bottom my-3"></div>
              </div>
              <div class="col-sm-12 mb-3">
                <label class="form-label" for="event-venue">Venue</label>
                <input class="form-control" id="event-venue" type="text" placeholder="Venue" name="tempat_pelaksanaan">
              </div>
{{-- 
              <label class="form-label" for="event-venue">Tamu / Guest</label>
              <div id="entryz">
                  <div class="form-floating col-md-12">
                    <input class="form-control" id="floatingInput" name="email[]" type="email" placeholder="name@example.com" />
                    <label for="floatingInput">Email</label>
                    <a class="btn btn-success me-1" type="button" id="add_btn" href="javascript:void(0);">
                      <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>
                    </a>
                  </div>
                  <br>
                </div> --}}
              
              <div class="col-12">
                <label class="form-label" for="event-description">Description</label>
                <textarea class="form-control" id="event-description" rows="6" name="keterangan_event"></textarea>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</form>
@endsection

@section('js')
    <script type="text/javascript">
    $(document).ready(function(){
      var maxField = 5;
      var addBtn = $('#add_btn');
      var wrapper = $('#entryz');
      var fieldHTML = `<div class="form-floating col-md-12">
                    <input class="form-control" id="floatingInput" name="email[]" type="email" placeholder="name@example.com" />
                    <label for="floatingInput">Email</label>
                    <a class="btn btn-danger me-1" type="button" id="rmv_btn" href="javascript:void(0);">
                      <span class="fas fa-minus me-1" data-fa-transform="shrink-3"></span>
                    </a>
                  </div>
                  <br>`;
      var x = 1;
      $(addBtn).click(function(){
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
      });

      $(wrapper).on('click', '#rmv_btn', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
      });
      
    });
    </script>
@endsection