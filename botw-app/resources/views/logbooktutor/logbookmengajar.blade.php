@extends('layouts.main')

@section('daftarlogbook')
<div class="card">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0">Data Logbook Tutor</h5>
        </div>
      </div>
    </div>
    <div class="card-body py-0 border-top">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-4493da1e-1e0b-4482-89ff-6cbf5297dee1" id="dom-4493da1e-1e0b-4482-89ff-6cbf5297dee1">
          <div class="card shadow-none">
            <div class="card-body p-0 pb-3">
              <div class="d-flex align-items-center justify-content-end my-3">
                <div id="bulk-select-replace-element" class="">
                  <a href="{{ route('logbook.create')}}" class="btn btn-falcon-success btn-sm" type="button"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="ms-1">New</span></a>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                @foreach ($logbook as $item)
                    
                <div class="card overflow-hidden" style="width: 20rem;">
                  <div class="card-img-top"><img class="img-fluid" src="{{asset('images/lampiran_logbook/' . $item -> lampiran_kegiatan )}}" alt="Card image cap"></div>
                  <div class="card-body">
                    <h5 class="card-title">{{ $item -> judul_logbook }}</h5>
                    <p class="card-text">{{ $item -> isi_logbook }}</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection