@extends('layouts.main')
@section('formplusbantuan')
<div class="card">
    <div class="card-body">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
              <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Transaksi Pengeluaran Bantuan</h5>
            </div>
          </div>
        <form action="{{ route('bantuan.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-form-name">Nama Transaksi</label>
              <input class="form-control" id="basic-form-name" type="text" name="nama_bantuan"/>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Rp</span>
              <input class="form-control" type="text" aria-label="Rupiah amount (with dot and two decimal places)" name="amount_bantuan"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-form-gender">Pilih KU Anak</label>
              <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="ku_id">
                <option selected="selected">Pilih KU yg Dapat Rewards</option>
                @foreach ($collection_ank as $itemanak)
                  <option value="{{ $itemanak -> id }}">{{ $itemanak -> ku_description }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="customFile">Gambar Barang</label>
              <input class="form-control" id="customFile" type="file" name="lampiran_bantuan"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-form-textarea">Keterangan Barang Dibeli</label>
              <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="keterangan"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
          </form>
    </div>
</div>
@endsection