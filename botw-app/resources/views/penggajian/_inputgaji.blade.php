@extends('main')
@section('inputgajistaff')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><svg class="svg-inline--fa fa-circle fa-w-16 fa-stack-2x text-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-stack-2x text-300"></i> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-spinner fa-w-16 fa-inverse fa-stack-1x text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg><!-- <i class="fa-inverse fa-stack-1x text-primary fas fa-spinner"></i> Font Awesome fontawesome.com --></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Input Gaji Karyawan</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
    <p class="mb-0">Pastikan data yang diinputkan sudah benar :)</p>
  </div>
</div>
<form method="POST" action="/add-penggajian">
@csrf
<div class="card">
  <div class="card-body">
      <div class="form-group">
            <div class="mb-3">
              <label class="form-label" for="bootstrap-wizard-wizard-name">Periode</label>
              <select class="form-select" aria-label="Default select example" name="periode">
                <option selected="">Pilih Periode</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
              </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="form-wizard-progress-wizard-email">Pilih Staff</label>
            <select class="form-select" aria-label="Default select example" id="staff_id" name="staff_id">
              <option selected="">Pilih Staff...</option>
              @foreach ($data_staff as $item)
                <option value="{{ $item -> id }}">{{ $item -> nama}}</option>
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
        <label class="col-sm-2 col-form-label" for="transport">Transport</label>
        <div class="col-sm-10">
          <input class="form-control" id="transport" type="text" disabled value="" />
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="uang_makan">Uang makan</label>
        <div class="col-sm-10">
          <input class="form-control" id="uang_makan" type="text" disabled value="" />
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
        let transport =  $('#transport').val() ?? 0
        let uang_makan =  $('#uang_makan').val() ?? 0

        let total = (parseInt(gaji_pokok) + parseInt(transport) + parseInt(uang_makan)) + (parseInt(val) * parseInt(lembur));

        $('#total_lembur').val(total)

      }

      // function formatRupiah(angka, prefix) {
      //       var number_string = angka.replace(/[^,\d]/g, "").toString(),
      //           split = number_string.split(","),
      //           sisa = split[0].length % 3,
      //           rupiah = split[0].substr(0, sisa),
      //           ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      //       // tambahkan titik jika yang di input sudah menjadi angka ribuan
      //       if (ribuan) {
      //           separator = sisa ? "." : "";
      //           rupiah += separator + ribuan.join(".");
      //       }

      //       rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      //       return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
      //   }
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
            $('#transport').val(staffArray.transport)
            $('#uang_makan').val(staffArray.uang_makan)
          //   $('#gajistaff').empty()
          //   let res = staffArray.map((karyawan, index) => {
          //     let list = `
          //     <div class="row mb-3">
          //   <label class="col-sm-2 col-form-label" for="colFormLabel">Gaji Pokok</label>
          //   <div class="col-sm-10">
          //     <input class="form-control-plaintext outline-none" id="staticEmail" type="text" readonly="" value="${staff.gaji_pokok}" />
          //   </div>
          // </div>
          // <div class="row mb-3">
          //   <label class="col-sm-2 col-form-label" for="colFormLabel">Transport</label>
          //   <div class="col-sm-10">
          //     <input class="form-control-plaintext outline-none" id="staticEmail" type="text" readonly="" value="${staff.transport}" />
          //   </div>
          // </div>
          // <div class="row mb-3">
          //   <label class="col-sm-2 col-form-label" for="colFormLabel">Uang Makan</label>
          //   <div class="col-sm-10">
          //     <input class="form-control-plaintext outline-none" id="staticEmail" type="text" readonly="" value="${staff.uang_makan}" />
          //   </div>
          // </div>`;
          // $('#gajistaff').append(list);
          //   });
          }
        });
      });
    </script>
@endsection