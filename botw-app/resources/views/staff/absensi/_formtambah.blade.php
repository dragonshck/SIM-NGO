@extends('main')
@section('formtambahabsenstaff')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><svg class="svg-inline--fa fa-circle fa-w-16 fa-stack-2x text-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-stack-2x text-300"></i> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-spinner fa-w-16 fa-inverse fa-stack-1x text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg><!-- <i class="fa-inverse fa-stack-1x text-primary fas fa-spinner"></i> Font Awesome fontawesome.com --></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Input Absen Karyawan</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
    <p class="mb-0">Pastikan data yang diinputkan sudah benar :)</p>
  </div>
</div>
<form method="POST" action="/add-absenstaff">
@csrf
<div class="card">
  <div class="card-body">
      <div class="form-group">
            <div class="mb-3">
              <label class="form-label" for="bootstrap-wizard-wizard-name">Periode</label>
              <select class="form-select" aria-label="Default select example" name="periode">
                <option selected="">Pilih Periode</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="3">April</option>
                <option value="3">May</option>
                <option value="3">June</option>
                <option value="3">July</option>
                <option value="3">August</option>
                <option value="3">September</option>
                <option value="3">October</option>
                <option value="3">November</option>
                <option value="3">December</option>
              </select>
            </div>
          <div class="mb-3">
            <label class="form-label" for="datepicker">Pilih Tanggal Absensi</label>
            <input class="form-control datetimepicker" name="tanggal_absen" id="datepicker" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' />
          </div>
      </div>
      <div class="form-group">
        <div class="mb-3">
          <div class="table-responsive scrollbar">
            <table class="table table-striped">
              <thead>
                <tr class="btn-reveal-trigger">
                  <th scope="col">Staff</th>
                  <th scope="col">Jabatan</th>
                  <th class="text-end" scope="col">Kehadiran</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_staff as $item)
                  <tr class="btn-reveal-trigger">
                    <td class="align-middle text-nowrap">
                      <div class="d-flex align-items-center">
                      <div class="avatar avatar-xl">
                        <img class="rounded-circle" src="{{ asset('fotostaff/' .$item -> fotoprofil) }}" alt="" />
                      </div>
                      <div class="ms-2">{{ $item -> nama }}</div>
                    </div>
                  </td>
                    <td class="align-middle text-nowrap">{{ $item -> rolekaryawan -> name }}</td>
                    <td class="align-middle text-nowrap">
                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="absensi[{{ $item -> id}}]>
                        <option value="">Pilih Absensi</option>
                        <option value="1">PRESENT</option>
                        <option value="2">PERMIT</option>
                        <option value="3">SICK</option>
                        <option value="4">ALPHA</option>
                      </select>
                    </td>
                  </tr> 
                @endforeach         
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