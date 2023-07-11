@extends('layouts.main')
@section('updatejabatan')
<div class="card">
    <div class="card-body position-relative">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
              <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor" id="hoverable-rows">Edit Data Jabatan<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#hoverable-rows" style="padding-left: 0.375em;"></a></h5>
              </div>
            </div>
          </div>
          <form class="row g-3" action="{{ route('jabatanstaff.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
              <label class="form-label" for="inputEmail4">Name</label>
              <input class="form-control" id="inputEmail4" type="text" name="name" value="{{ $data -> name }}"/>
            </div>
            <div class="col-md-6">
              <label class="form-label" for="inputPassword4">Gaji Pokok</label>
              <input class="form-control" id="inputPassword4" type="text" name="gaji_pokok" value="{{ $data -> gaji_pokok }}"/>
            </div>
            <div class="col-12">
              <label class="form-label" for="inputAddress">Transport</label>
              <input class="form-control" id="inputAddress" type="text" name="transport" value="{{ $data -> transport }}"/>
            </div>
            <div class="col-12">
                <label class="form-label" for="inputAddress">Uang Makan</label>
                <input class="form-control" id="inputAddress" type="text" name="uang_makan" value="{{ $data -> uang_makan }}"/>
            </div>
            <div class="col-12">
              <label class="form-label" for="inputAddress">Denda Staf / Absensi</label>
              <input class="form-control" id="inputAddress" type="text" name="denda_alpha" value="{{ $data -> denda_alpha }}"/>
          </div>
          <div class="col-12">
            <label class="form-label" for="inputAddress">Lembur Staf</label>
            <input class="form-control" id="inputAddress" type="text" name="lembur_staf" value="{{ $data -> lembur_staf }}"/>
          </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>
    </div>
</div>
@endsection