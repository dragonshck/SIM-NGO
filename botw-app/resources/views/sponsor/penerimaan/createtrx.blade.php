<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@extends('layouts.main')

@section('tambahdatapenerimaansponsor')
    <div class="card">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                  <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Tambah Data Penerimaan Hadiah Sponsor</h5>
                </div>
              </div>
            <form action="{{ route('hadiahsponsor.store') }}" method="POST" enctype="multipart/form-data" class="dropzone dropzone-multiple p-0" id="my-awesome-dropzone" data-dropzone="data-dropzone">
              @csrf
                <div class="mb-3">
                  <label class="form-label" for="basic-form-name">Nama Transaksi</label>
                  <input class="form-control" id="basic-form-name" type="text" name="nama_hadiah"/>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text">Rp</span>
                  <input class="form-control" type="text" aria-label="Rupiah amount (with dot and two decimal places)" name="amount_hadiah"/>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-gender">Pilih Anak</label>
                  <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="anak_id">
                    <option selected="selected">Pilih Anak yg Dapat Rewards</option>
                    @foreach ($data_anak as $itemanak)
                      <option value="{{ $itemanak -> id }}">{{ $itemanak -> user -> name }}</option>
                    @endforeach
                  </select>
                </div>
                {{-- <div class="mb-3">
                  <label class="form-label" for="basic-form-gender">Pilih Tipe Hadiah</label>
                  <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="id_tipe_hadiah">
                    <option selected="selected">Pilih Tipe Hadiah yg Didapat</option>
                    @foreach ($data_tipehadiah as $itemtype)
                      <option value="{{ $itemtype -> id }}">{{ $itemtype -> nama_kode_hadiah }}</option>
                    @endforeach
                  </select>
                </div> --}}
                <div class="mb-3">
                  <label class="form-label" for="customFile">Gambar Barang</label>
                  <input class="form-control" id="customFile" type="file" name="lampiran_hadiah"/>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-textarea">Keterangan Barang Dibeli</label>
                  <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="keterangan_hadiah"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
              </form>
        </div>
    </div>
@endsection