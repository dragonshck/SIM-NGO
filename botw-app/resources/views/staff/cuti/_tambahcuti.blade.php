@extends('main')
@section('tambahcutibang')
<div class="card">
    <div class="card-body">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
              <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Tambah Data Cuti</h5>
            </div>
          </div>
        <form action="/add-cuti" method="POST" enctype="multipart/form-data" class="dropzone dropzone-multiple p-0" id="my-awesome-dropzone" data-dropzone="data-dropzone">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-form-gender">Pilih Karyawan</label>
            <select class="form-select" id="basic-form-gender" aria-label="Default select example" name="staff_id">
              <option selected="selected">Pilih Karyawan</option>
              @foreach ($data_staff as $itemtype)
                <option value="{{ $itemtype -> id }}">{{ $itemtype -> nama }}</option>
              @endforeach
            </select>
          </div>
            <div class="mb-3">
                <label class="form-label" for="datepicker">Start Date</label>
                <input class="form-control datetimepicker" id="datepicker" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' name="tgl_mulai" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="datepicker">End Date</label>
                <input class="form-control datetimepicker" id="datepicker" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' name="tgl_selesai" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="customFile">Masukkan Bukti</label>
                <input class="form-control" id="customFile" type="file" name="gambar_bukti" />
              </div>
            <div class="mb-3">
              <label class="form-label" for="basic-form-textarea">Keterangan Cuti</label>
              <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description" name="keterangan"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
          </form>
    </div>
</div>
@endsection