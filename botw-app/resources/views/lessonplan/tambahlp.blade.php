@extends('layouts.main')

@section('formtambahlp')
<div class="card-header bg-light">
    <div class="row flex-between-end">
      <div class="col-auto align-self-center">
        @can('read access tutor')
        <h5 class="mb-0" data-anchor="data-anchor" id="basic-form">Tambah Lesson Plan Baru<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#basic-form" style="padding-left: 0.375em;"></a></h5>
        @endcan
      </div>
    </div>
  </div>
        <div class="card-body bg-light">
            <form action="{{ route('lessonplan.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                  <label class="form-label" for="basic-form-name">Judul Lesson Plan</label>
                  <input class="form-control" id="basic-form-name" type="text" placeholder="Masukkan Judul" name="judul_lp" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Upload File</label>
                  <input class="form-control" type="file" name="lampiran_lp"/>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-textarea">Description</label>
                  <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="isi_lp"></textarea>
                </div>
                
                <button class="btn btn-primary" type="submit">Submit</button>
              </form>
        </div>
    
@endsection