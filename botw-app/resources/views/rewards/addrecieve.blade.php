@extends('main')
@section('formpenerimaanrewards')
<div class="card">
    <div class="card-body">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
              <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Tambah Data Pengeluaran Rewards</h5>
            </div>
          </div>
        <form action="/tambah-penerimaan-rewards" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-form-name">Nama Transaksi</label>
              <input class="form-control" id="basic-form-name" type="text" name="nama_transaksi"/>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Rp</span><span class="input-group-text">0.00</span>
              <input class="form-control" type="text" aria-label="Rupiah amount (with dot and two decimal places)" name="amount"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-form-gender">Pilih Anak</label>
              <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="anak_id">
                <option selected="selected">Pilih Anak yg Dapat Rewards</option>
                @foreach ($collection_ank as $itemanak)
                  <option value="{{ $itemanak -> id }}">{{ $itemanak -> fullname }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-form-gender">Pilih Tipe Hadiah</label>
              <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="tipe_hadiah_sponsor_id">
                <option selected="selected">Pilih Tipe Hadiah yg Didapat</option>
                @foreach ($collection_tp as $itemtype)
                  <option value="{{ $itemtype -> id }}">{{ $itemtype -> nama_kode_hadiah }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Upload Image</label>
              <input class="form-control" id="formFileMultiple" type="file" multiple="multiple" name="images[]" accept="image/*"/>
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