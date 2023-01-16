@extends('layouts.main')
@section('inputabsenanak')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><svg class="svg-inline--fa fa-circle fa-w-16 fa-stack-2x text-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-stack-2x text-300"></i> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-spinner fa-w-16 fa-inverse fa-stack-1x text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg><!-- <i class="fa-inverse fa-stack-1x text-primary fas fa-spinner"></i> Font Awesome fontawesome.com --></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Input Absen Anak</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
    <p class="mb-0">Pastikan data yang diinputkan sudah benar :)</p>
  </div>
</div>
<form method="POST" action="{{ route('absenanak.store') }}">
@csrf
<div class="card">
  <div class="card-body">
      <div class="form-group">
          <div class="mb-3">
            <label class="form-label" for="form-wizard-progress-wizard-email">Kelompok Umur</label>
            <select class="form-select" aria-label="Default select example" id="kelompokumur_id" required>

              @foreach($data_ku as $index => $item)
              <option value="{{ $item -> id }}">{{ $item -> ku_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="datepicker">Pilih Tanggal Absensi</label>
            <input class="form-control datetimepicker" name="tanggal_absen" id="datepicker" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' />
            <label class="col-sm-2 col-form-label" for="staticEmail">Periode</label>
          <div class="col-sm-10">
            <input class="form-control" id="periodz" name="periode" type="text" value="" />
            <div class="mb-3 row"></div>
          </div>
          </div>
      </div>
      <div class="form-group">
        <div class="mb-3">
          <div class="table-responsive scrollbar">
            <table class="table table-striped overflow-hidden" id="tampil_anak">
              <thead>
                <tr class="btn-reveal-trigger">
                  <th scope="col">Nama Anak</th>
                  <th scope="col"></th>
                  <th class="text-end" scope="col">Kehadiran</th>
                </tr>
              </thead>
              <tbody id="data_anak">               
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="float-right">
        <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary" name="btnIn">Submit</button> 
        </div>
    </div>
  </div>
</div>
</form>

@endsection



@section('js')
<script>
  $('#kelompokumur_id').change(function() {
  var id = $(this).val();
    $.ajax({
      url: "{{url('fetch-anak')}}/"+id,
      type: 'get',
      dataType: 'json',
      success: function(response) {
        if(response.success){
          let dataArray = response.data
          $('#data_anak').empty()
          let res = dataArray.map((person, index) => {
          var ambasing = {!! json_encode($kabsen->toArray()) !!}
          console.log(ambasing);
          let list = `
              <tr class="btn-reveal-trigger">
                <td>${person.user.name}</td>
                <td></td>
                <td class="text-end">
                  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="absensi[${person.id}]">`;
                    $.each(ambasing, function(index, value) {
                      list += `<option value="${value.id}">${value.nama_absen}</option>`;
                    });
                    list += 
                    `</select>
                </td>
              </tr>
            `;
            $('#data_anak').append(list);
          });

        }
      }
  });
});
</script>
@endsection

@section('getPeriodeAbsensi')
    <script>
      $(function() {
        const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
         
        var flatpickr;
        $("#datepicker").datepicker({
          dateFormat: "yy-m-d",
          changeMonth: true,
          changeYear: true,
          onSelect: function(dateText, inst) {
            var dt = $.datepicker.parseDate("yy-m-d", dateText);
            flatpickr = month[dt.getMonth()];
            console.log("Birth Month: " + flatpickr);
            $('#periodz').val(flatpickr);
          }
        });
      });
    </script>
@endsection