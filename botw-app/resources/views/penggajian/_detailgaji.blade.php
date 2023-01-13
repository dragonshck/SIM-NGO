@extends('layouts.main')
@section('detailgaji')
<div class="card mb-3">
    <div class="card-body">
      <div class="row justify-content-between align-items-center">
        <div class="col-md">
          <h5 class="mb-2 mb-md-0">Detail Penggajian Staff</h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-falcon-default btn-sm me-1 mb-2 mb-sm-0" type="button"><svg class="svg-inline--fa fa-print fa-w-16 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="print" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z"></path></svg><!-- <span class="fas fa-print me-1"> </span> Font Awesome fontawesome.com -->Print</button>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="row align-items-center text-center mb-3">
        <div class="col-sm-6 text-sm-start"><img src="{{ asset('assets/dawn.png') }}" alt="invoice" width="150"></div>
        <div class="col text-sm-end mt-3 mt-sm-0">
          <h2 class="mb-3">Invoice</h2>
          <h5>PPA Kalvari - IO 868</h5>
          <p class="fs--1 mb-0">Jl. Werkudoro No.33, Polehan, Kec. Blimbing <br> Kota Malang, Jawa Timur 65121</p>
        </div>
        <div class="col-12">
          <hr>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col">
          <h6 class="text-500">Invoice to</h6>
          <h5>{{ $gaji -> staff -> user -> name }}</h5>
          <p class="fs--1">{{ $gaji -> staff -> current_addr }}</p>
          <p class="fs--1">{{ $gaji -> staff -> email }}<br>{{ $gaji -> staff -> phone }}</p>
        </div>
        <div class="col-sm-auto ms-auto">
          <div class="table-responsive">
            <table class="table table-sm table-borderless fs--1">
              <tbody>
                <tr>
                  <th class="text-sm-end">Invoice No:</th>
                  <td>{{ $gaji -> id }}</td>
                </tr>
                <tr>
                  <th class="text-sm-end">Tanggal Gaji:</th>
                  <td>{{ \Carbon\Carbon::parse($gaji -> tgl_salary)->format('j F, Y') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="table-responsive scrollbar mt-4 fs--1">
        <table class="table table-striped border-bottom">
          <thead class="light">
            <tr class="bg-primary text-white dark__bg-1000">
              <th class="border-0">Periode</th>
              <th class="border-0 text-center">Gaji Pokok</th>
              <th class="border-0 text-center">Transportasi</th>
              <th class="border-0 text-center">Uang Makan</th>
              <th class="border-0 text-end">Gaji Lembur</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="align-middle">
                <h6 class="mb-0 text-nowrap"></h6>
              </td>
              <td class="align-middle text-center">@currency($gaji -> staff -> jabatan -> gaji_pokok)</td>
              <td class="align-middle text-center">@currency($gaji -> staff -> jabatan -> tunjangan_kendaraan)</td>
              <td class="align-middle text-center">@currency($gaji -> staff -> jabatan -> tunjangan_makanan)</td>
              <td class="align-middle text-end">@currency($total_lembur)</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row justify-content-end">
        <div class="col-auto">
          <table class="table table-sm table-borderless fs--1 text-end">
            <tbody>
            <tr class="border-top border-top-2 fw-bolder text-900">
              <th>Total:</th>
              <td>@currency($gaji -> total)</td>
            </tr>
          </tbody></table>
        </div>
      </div>
    </div>
    <div class="card-footer bg-light">
      <p class="fs--1 mb-0"><strong>Notes: </strong>Jika ada kesalahan data, mohon beritahu Koordinator segera!</p>
    </div>
  </div>
@endsection