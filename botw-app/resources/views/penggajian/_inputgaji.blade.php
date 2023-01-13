@extends('layouts.main')
@section('inputgajistaff')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><svg class="svg-inline--fa fa-circle fa-w-16 fa-stack-2x text-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-stack-2x text-300"></i> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-spinner fa-w-16 fa-inverse fa-stack-1x text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg><!-- <i class="fa-inverse fa-stack-1x text-primary fas fa-spinner"></i> Font Awesome fontawesome.com --></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Input Gaji Karyawan</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
    <p class="mb-0">Pastikan data yang diinputkan sudah benar :)</p>
  </div>
</div>
<form method="POST" action="{{ route('penggajian.store') }}">
@csrf
<div class="card">
  <div class="card-body">
      <div class="form-group">
          <div class="mb-3">
            <label class="form-label" for="form-wizard-progress-wizard-email">Pilih Staff</label>
            <select class="form-select" aria-label="Default select example" id="staff_id" name="staff_p_p_a_id">
              <option selected="">Pilih Staff...</option>
              @foreach ($data_staff as $item)
                <option value="{{ $item -> id }}">{{ $item -> user -> name}}</option>
              @endforeach
              
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="datepicker">Tanggal Paycheck</label>
            <input class="form-control datetimepicker" id="datepicker" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' name="tgl_salary"/>
          </div>
      </div>
      <div class="form-group">
        <div class="detail" id="gajistaff">
          
        </div>
        
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="gaji_pokok">Gaji Pokok</label>
        <div class="col-sm-10">
          <input class="form-control" id="gaji_pokok" type="text" disabled value=""/>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="tunjangan_kendaraan">Transport</label>
        <div class="col-sm-10">
          <input class="form-control" id="tunjangan_kendaraan" type="text" disabled value="" />
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="tunjangan_makanan">Uang makan</label>
        <div class="col-sm-10">
          <input class="form-control" id="tunjangan_makanan" type="text" disabled value="" />
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="colFormLabel">Lembur</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" id="lembur" placeholder="Banyak Jam Lembur" name="jumlah_overtime"/>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="colFormLabel">Gaji Lembur</label>
        <div class="col-sm-10">
          <input class="form-control" type="text" id="gaji_lembur" placeholder="Rp / Jam" name="uang_overtime" onkeyup="setLembur(event)"/>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="colFormLabel">Total</label>
        <div class="col-sm-10">
          <input class="form-control-plaintext outline-none" id="total_lembur" name="total" value="" ype="text" readonly=""/>
        </div>
      </div>
      <div class="float-right">
        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary" name="btnIn">Submit</button> 
        </div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection

@section('jawascript')

    <script>
      function setLembur(event){
        event.preventDefault()
        let val = event.target.value
        let lembur = document.getElementById('lembur').value
        let gaji_pokok =  $('#gaji_pokok').val() ?? 0
        let transport =  $('#tunjangan_kendaraan').val() ?? 0
        let uang_makan =  $('#tunjangan_makanan').val() ?? 0

        let total = (parseInt(gaji_pokok) + parseInt(transport) + parseInt(uang_makan)) + (parseInt(val) * parseInt(lembur));

        $('#total_lembur').val(total)

      }

      $('#staff_id').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "{{url('fetch-gaji')}}/"+id,
          type: 'get',
          dataType: 'json',
          success: function(response) {
            let staffArray = response.data
            console.log(staffArray.gaji_pokok);

            $('#gaji_pokok').val(staffArray.gaji_pokok)
            $('#tunjangan_kendaraan').val(staffArray.tunjangan_kendaraan)
            $('#tunjangan_makanan').val(staffArray.tunjangan_makanan)
          }
        });
      });
    </script>
@endsection