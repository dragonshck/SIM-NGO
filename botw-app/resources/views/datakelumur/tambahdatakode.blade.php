@extends('layouts.main')

@section('formtambahdata')
    <div class="card">
        <div class="card-body position-relative">
            <div class="card-header border-bottom">
                <div class="row flex-between-end">
                  <div class="col-auto align-self-center">
                    <h5 class="mb-0" data-anchor="data-anchor" id="hoverable-rows">Tambah Data Kode Umur<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#hoverable-rows" style="padding-left: 0.375em;"></a></h5>
                  </div>
                </div>
              </div>
              <form class="row g-3" action="{{ route('kelompokumur.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label class="form-label" for="inputPassword4">Nama Kode</label>
                  <input class="form-control" id="inputPassword4" type="text" name="ku_name"/>
                </div>
                <div class="col-12">
                  <label class="form-label" for="inputAddress">Keterangan Kode</label>
                  <input class="form-control" id="inputAddress" type="text" name="ku_description" />
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="inputEmail4">Assign Tutor</label>
                  <select class="form-select" aria-label="Default select example">
                    <option selected="">Open this select menu</option>
                    @foreach ($tutor as $item)
                      <option value="{{ $item -> user -> id }}">{{ $item -> user -> name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </form>
        </div>
    </div>
@endsection