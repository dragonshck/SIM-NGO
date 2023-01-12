<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@extends('main')

@section('tambahdatapenerimaansponsor')
    <div class="card">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                  <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Tambah Data Penerimaan Hadiah Sponsor</h5>
                </div>
              </div>
            <form action="/insert-data-penerimaan" method="POST" enctype="multipart/form-data" class="dropzone dropzone-multiple p-0" id="my-awesome-dropzone" data-dropzone="data-dropzone">
              @csrf
                <div class="mb-3">
                  <label class="form-label" for="basic-form-name">Nama Transaksi</label>
                  <input class="form-control" id="basic-form-name" type="text" name="namatransaksi"/>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text">Rp</span><span class="input-group-text">0.00</span>
                  <input class="form-control" type="text" aria-label="Rupiah amount (with dot and two decimal places)" name="total_harga"/>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-gender">Pilih Anak</label>
                  <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="id_anak">
                    <option selected="selected">Pilih Anak yg Dapat Rewards</option>
                    @foreach ($data_anak as $itemanak)
                      <option value="{{ $itemanak -> id }}">{{ $itemanak -> fullname }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-gender">Pilih Tipe Hadiah</label>
                  <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="id_tipe_hadiah">
                    <option selected="selected">Pilih Tipe Hadiah yg Didapat</option>
                    @foreach ($data_tipehadiah as $itemtype)
                      <option value="{{ $itemtype -> id }}">{{ $itemtype -> nama_kode_hadiah }}</option>
                    @endforeach
                  </select>
                </div>
                {{-- <div class="mb-3">
                  <div class="fallback">
                    <input type="file" multiple="multiple" class="form-control" id="formFileMultiple" multiple="multiple" name="images[]" accept="image/*"/>
                  </div>
                  <div class="dz-message" data-dz-message="data-dz-message"> <img class="me-2" src="{{ asset('falcon-style/public/assets/img/icons/cloud-upload.svg') }}" width="25" alt="" />Drop your files here</div>
                  <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                    <div class="d-flex media mb-3 pb-3 border-bottom btn-reveal-trigger"><img class="dz-image" src="{{ asset('falcon-style/public/assets/img/generic/image-file-2.png') }}" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                      <div class="flex-1 d-flex flex-between-center">
                        <div>
                          <h6 data-dz-name="data-dz-name"></h6>
                          <div class="d-flex align-items-center">
                            <p class="mb-0 fs--1 text-400 lh-1" data-dz-size="data-dz-size"></p>
                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                          </div><span class="fs--2 text-danger" data-dz-errormessage="data-dz-errormessage"></span>
                        </div>
                        <div class="dropdown font-sans-serif">
                          <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                          <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove File</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <div class="mb-3">
                  <label class="form-label">Upload Image</label>
                  <input class="form-control" id="formFileMultiple" type="file" multiple="multiple" name="images[]" accept="image/*"/>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-textarea">Keterangan Barang Dibeli</label>
                  <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="barang_dibeli"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
              </form>
        </div>
    </div>
@endsection