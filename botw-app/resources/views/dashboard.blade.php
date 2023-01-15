@extends('layouts.main')

@section('dashboardstaff')
<div class="row g-3 mb-3">
    <div class="col-sm-6 col-md-4">
      <div class="card overflow-hidden" style="min-width: 12rem">
        <div class="bg-holder bg-card" style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-1.png') }});">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
          <h6>Anak</h6>
          <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup="{&quot;endValue&quot;:{{ $data_anak }}}">{{ $data_anak }}</div>
          
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-md-4">
      <div class="card overflow-hidden" style="min-width: 12rem">
        <div class="bg-holder bg-card" style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-2.png') }});">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
          <h6>Staff</h6>
          <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup="{&quot;endValue&quot;:{{ $data_staff }}}">{{ $data_staff }}</div>
          
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card overflow-hidden" style="min-width: 12rem">
        <div class="bg-holder bg-card" style="background-image:url({{ asset('falcon/public/assets/img/icons/spot-illustrations/corner-3.png') }});">
        </div>
        <!--/.bg-holder-->

        <div class="card-body position-relative">
          <h6>Sponsors</h6>
          <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" data-countup="{&quot;endValue&quot;:{{ $data_sp }}}">{{ $data_sp }}</div>
          
        </div>
      </div>
    </div>
  </div>
  <div class="row g-3 mb-3">
    <div class="col-lg-6">
        <div class="card">
          <div class="card-header">
            <div class="row flex-between-end">
              <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor" id="pie-chart">Sebaran Kelompok Umur<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#pie-chart" style="padding-left: 0.375em;"></a></h5>
              </div>
              
            </div>
          </div>
          <div class="card-body bg-light">
            <canvas class="max-w-100" id="chartjs-pie-chart" width="381" height="350" style="display: block; box-sizing: border-box; height: 350px; width: 381px;"></canvas>
          </div>
        </div>
      </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header">
          <div class="row flex-between-end">
            <div class="col-auto align-self-center">
              <h5 class="mb-0" data-anchor="data-anchor" id="line-chart">Grafik Absensi Anak<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#line-chart" style="padding-left: 0.375em;"></a></h5>
            </div>
            <div class="col-auto ms-auto">
              
            </div>
          </div>
        </div>
        <div class="card-body bg-light">
            <canvas class="max-w-100" id="chartjs-line-chart" width="381" height="235" style="display: block; box-sizing: border-box; height: 235px; width: 381px;"></canvas>
        </div>
      </div>
    </div>
  </div>
@endsection