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
          <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":{{$totalrapor}}}'>0</div>
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
  <div class="row g-3 mb-3">
    <div class="row g-3 mb-3">
      <div class="col-md-12">
        <div class="card mb-3 mb-lg-0 h-100">
          <div class="card-header bg-light">
            <h5 class="mb-0">Kegiatan Terbaru</h5>
          </div>
          @if (count($events) >= 1)
              
          <div class="card-body fs--1">
            @foreach ($events as $index => $item)
                
            <div class="d-flex btn-reveal-trigger">
              <div class="calendar"><span class="calendar-month">{{ $bulan[$index] }}</span><span class="calendar-day">{{ $tanggal[$index] }}</span></div>
              <div class="flex-1 position-relative ps-3">
                <h6 class="fs-0 mb-0"><a href="/kegiatanppa/{{ $item -> id }}/show">{{ $item -> summary }}</a></h6>
                <p class="mb-1">Organized by <p class="text-700">PPA Kalvari</p></p>
                <p class="text-1000 mb-0">Time: {{ $starthour[$index] }}</p>
                <p class="text-1000 mb-0">Duration: {{ $startdate[$index] }} - {{ $enddate[$index] }}</p>Place: {{ $item -> location }}
                <div class="border-dashed-bottom my-3"></div>
              </div>
            </div>
  
            @endforeach
            
          @else
          <div class="card-body p-4 p-sm-5">
            <div class="text-center"><img class="d-block mx-auto mb-4" src="{{ asset('assets/404.jpg') }}" alt="Email" width="200">
              <h4 class="mb-2">Belum ada kegiatan ｡ • ́︿•̀｡</h4>
              <p>Tetap pantau pengumuman dari <strong> E-Mail / WhatsApp</strong> ya! <br> Seluruh kegiatan terbaru akan tampil pada halaman ini.</p>
              {{-- <a class="btn btn-primary btn-sm mt-3" href="pages/authentication/simple/login.html"><svg class="svg-inline--fa fa-chevron-left fa-w-10 me-1" data-fa-transform="shrink-4 down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="" style="transform-origin: 0.3125em 0.5625em;"><g transform="translate(160 256)"><g transform="translate(0, 32)  scale(0.75, 0.75)  rotate(0 0 0)"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z" transform="translate(-160 -256)"></path></g></g></svg><!-- <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span> Font Awesome fontawesome.com -->Return to login</a> --}}
            </div>
          </div>
          @endif
          </div>
          {{-- <div class="card-footer bg-light p-0 border-top"><a class="btn btn-link d-block w-100" href="app/events/event-list.html">Semua Kegiatan<svg class="svg-inline--fa fa-chevron-right fa-w-10 ms-1 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg><!-- <span class="fas fa-chevron-right ms-1 fs--2"></span> Font Awesome fontawesome.com --></a></div>
        </div> --}}
      </div>
  
    </div>
  </div>
  <div class="col-xxl-6">
    <div class="card overflow-hidden">
      <div class="card-header">
        <h6 class="mb-0">Daftar Absensiku</h6>
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