@extends('main')

@section('formtambahlp')
<div class="card-header bg-light">
    <div class="row flex-between-end">
      <div class="col-auto align-self-center">
        <h5 class="mb-0" data-anchor="data-anchor" id="basic-form">Tambah Lesson Plan Baru<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#basic-form" style="padding-left: 0.375em;"></a></h5>
      </div>
    </div>
  </div>
        <div class="card-body bg-light">
            <form>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-name">Judul Lesson Plan</label>
                  <input name="keterangan_lp" class="form-control" id="basic-form-name" type="text" placeholder="Masukkan Judul" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-gender">Kelompok Umur</label>
                  <select class="form-select" id="basic-form-gender" aria-label="Default select example">
                    <option selected="selected">Pilih Kelompok Umur</option>
                    <option value="male">TK</option>
                    <option value="female">SD</option>
                    <option value="other">SMP</option>
                    <option value="other">SMA-K / Kuliah</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">Upload File</label>
                  <input class="form-control" type="file" name="lampiran_lp"/>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-textarea">Description</label>
                  <textarea name="desc" class="form-control" id="basic-form-textarea" rows="3" placeholder="Description"></textarea>
                </div>
                
                <button class="btn btn-primary" type="submit">Submit</button>
              </form>
        </div>
    
@endsection