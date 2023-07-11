@extends('layouts.main')
@section('tambahcutibang')
<div class="card">
    <div class="card-body">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
              <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Tambah Data Cuti</h5>
            </div>
          </div>
        <form action="{{ route('cutiizin.store') }}" id="myForm" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="datepicker"> </label>
            <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">{{ auth()->user()->name; }}</span>
              <input class="form-control" type="text" placeholder="Username" aria-label="Nama" name="staff_id" aria-describedby="basic-addon1" id="staff_id" value="{{ auth()->user()->staff->id; }}"/>
            </div>
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
            <button class="btn btn-primary" id="tambah-cuti" type="button" onclick="checkingClick(event)">Submit</button>
          </form>
    </div>
</div>
@endsection

@section('jawascript')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script type="text/javascript">
  function checkingClick(event) {
    console.log('checking xx')

    var id = $('#staff_id').val();

    $.ajax({
      url: "{{ url('getWarningLimitCuti') }}/" + id,
      method: 'GET',
      dataType: 'json',
      success: function (response) {
        console.log('res', response)

        if (response.data === 0) {
          // Submit the form
          $('#myForm').submit();
        } else {
          // Show the error message
          Swal.fire({
            title: 'Perhatian!',
            text: 'Anda sudah mengajukan cuti bulan ini! Anda bisa mengajukan lagi di bulan berikutnya.',
            icon: 'warning',
            confirmButtonText: 'OK'
          });
        }
      },
      error: function (xhr) {
        // Handle the error response
      }
    });
  }
</script>
@endsection