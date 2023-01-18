@extends('layouts.main')
@section('dashboardanak')
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-md-6">
      <div class="card overflow-hidden" style="min-width: 12rem">
        <div class="bg-holder bg-card" style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-1.png') }});">
        </div>
        <!--/.bg-holder-->
  
        <div class="card-body position-relative">
          <h6>Total Rapor</h6>
          <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":1}'>0</div>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-6">
      <div class="card overflow-hidden" style="min-width: 12rem">
        <div class="bg-holder bg-card" style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-2.png') }});">
        </div>
        <!--/.bg-holder-->
  
        <div class="card-body position-relative">
          <h6>Total Absen Saya</h6>
          <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":{{$totalabsen}}}'>0</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xxl-6">
    <div class="card overflow-hidden">
      <div class="card-header">
        <h6 class="mb-0">Daftar Absensikuh</h6>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive scrollbar">
          <table class="table mb-0 fs--1 border-200 table-borderless">
            <thead class="bg-light">
              <tr class="text-800 bg-200">
                <th class="text-nowrap">Tanggal Absen</th>
                <th class="text-center text-nowrap">Kelompok Umur</th>
                <th class="text-center text-nowrap">Nama Sponsor</th>
                <th class="text-end text-nowrap">Status Absen</th>
                <th class="pe-card text-end text-nowrap"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($student->attendances as $attendance)
              <tr class="border-bottom border-200">
                <td class="align-middle font-sans-serif fw-medium text-nowrap"><a href="">{{ \Carbon\Carbon::parse($attendance->tanggal_absen)->format('j F, Y') }}</a></td>
                <td class="align-middle text-center">{{ $attendance->anakabsen->kelompokumur->ku_name }}</td>
                <td class="align-middle text-center">{{ $attendance->anakabsen->sponsor->nama_sponsor }}</td>
                @if($attendance->status_absen)
                <td class="align-middle text-center">H</td>
                @else
                <td class="align-middle text-end">X</td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection