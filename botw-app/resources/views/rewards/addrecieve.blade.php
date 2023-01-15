@extends('layouts.main')
@section('formpenerimaanrewards')
<div class="card">
    <div class="card-body">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
              <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Tambah Transaksi Rewards Anak</h5>
            </div>
          </div>
        <form action="{{ route('rewards.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="mb-3">
              <label class="form-label" for="basic-form-name">Nama Transaksi</label>
              <input class="form-control" id="basic-form-name" type="text" name="nama_reward"/>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text">Rp</span>
              <input class="form-control" type="text" name="amount_reward"/>
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
            <div class="mb-3">
              <label class="form-label" for="basic-form-gender">Pilih Tipe Rewards</label>
              <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="tipe_reward">
                <option selected="selected">Pilih Tipe Hadiah yg Didapat</option>
                  <option value="SPP">SPP Pendidikan</option>
                  <option value="Barang / Tunai">Hadiah</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Masukkan Bukti / Slip</label>
              <input class="form-control" id="customFile" type="file" name="lampiran_reward"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-form-textarea">Keterangan</label>
              <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="keterangan_reward"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
          </form>
    </div>
</div>
@endsection