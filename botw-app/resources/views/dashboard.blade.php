@extends('layouts.main')

@section('dashboardstaff')
@cannot('read access anak')
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
            <p>Seluruh kegiatan terbaru akan tampil pada halaman ini.</p>
            {{-- <a class="btn btn-primary btn-sm mt-3" href="pages/authentication/simple/login.html"><svg class="svg-inline--fa fa-chevron-left fa-w-10 me-1" data-fa-transform="shrink-4 down-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="" style="transform-origin: 0.3125em 0.5625em;"><g transform="translate(160 256)"><g transform="translate(0, 32)  scale(0.75, 0.75)  rotate(0 0 0)"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z" transform="translate(-160 -256)"></path></g></g></svg><!-- <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span> Font Awesome fontawesome.com -->Return to login</a> --}}
          </div>
        </div>
        @endif
        </div>
        {{-- <div class="card-footer bg-light p-0 border-top"><a class="btn btn-link d-block w-100" href="app/events/event-list.html">Semua Kegiatan<svg class="svg-inline--fa fa-chevron-right fa-w-10 ms-1 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg><!-- <span class="fas fa-chevron-right ms-1 fs--2"></span> Font Awesome fontawesome.com --></a></div>
      </div> --}}
    </div>

  </div>

  <div class="row g-3 mb-3">
    <div class="col-lg-6">
    <div class="card echart-session-by-browser-card h-100">
      <div class="card-header d-flex flex-between-center bg-light py-2">
              <h6 class="mb-0">Sebaran Kelompok Umur</h6>
              <div class="dropdown font-sans-serif btn-reveal-trigger">
                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-session-by-browser" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-session-by-browser"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                </div>
              </div>
            </div>
            <div class="card-body d-flex flex-column justify-content-between py-3" style="width: 300px; height:300px;" >
              
                <!-- Find the JS file for the following chart at: src/js/charts/chartjs/chart-doughnut.js-->

                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                <canvas class="max-w-100" id="chartjs-sebaran-umur" width="350"></canvas>
              
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
            <canvas class="max-w-100" id="chartabsen" width="381" height="235" style="display: block; box-sizing: border-box; height: 235px; width: 381px;"></canvas>
        </div>
        <div class="card-footer bg-light py-2">
          <div class="row flex-between-center">
            <div class="col-auto">
              <select class="form-select form-select-sm" id="filter-year" name="filter-year">
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023" selected>2023</option>
                <option value="2024">2024</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endcannot


@endsection

@section('jsx')

<script>
  $('#filter-year').on('change', function(){
    let check = $('#filter-year').find(":selected").text();
    if(check){
      $.ajax({
      url: "{{url('fetch-dashboard')}}/"+check,
      type: 'get',
      dataType: 'json',
      success: function(response) {
        const ctx3 = document.getElementById('chartabsen').getContext("2d");
        let chartStatus = Chart.getChart("chartabsen"); // <canvas> id
    if (chartStatus != undefined) {
      chartStatus.destroy();
    }
      const absenfromdb = response.jumlah;
      const absenlabels = response.label;
      const absendata = {
      labels: absenlabels,
      datasets: [{
        label: 'Total Absen Masuk',
        data: absenfromdb,
        fill: false,
        borderColor: [
          'rgb(255, 99, 132)',
        ],
        tension: 0.1
      }]
    };
    const options5 = {
          responsive: true,
          maintainAspectRatio: true,
          layout: {
            padding: 10
          }
        };
      var myChartCheck = new Chart(ctx3, {
        type: 'line',
        data: absendata,
        options: options5,
      });
      
      }
    });
    }
  })
</script>
@endsection

@section('charts-dashboard')
<script>
  const ctx4 = document.getElementById('chartjs-sebaran-umur');
  const SebaranLabel = JSON.parse('{!! json_encode($labelsku) !!}');
  const sebaranfromdb = JSON.parse('{!! json_encode($datachart) !!}');
  
  const SebaranData = {
    labels : SebaranLabel,
    datasets: [{
    label: 'Sebaran Kelompok Umur',
    data: sebaranfromdb,
    backgroundColor: [
      "rgb(255, 99, 132, 0.2)", "rgb(54, 162, 235, 0.2)",
      "rgb(255, 206, 86, 0.2)", "rgb(75, 192, 192, 0.2)",
    ],
    borderColor: [
      "rgb(255, 99, 132, 1)", "rgb(54, 162, 235, 1)",
      "rgb(255, 206, 86, 1)", "rgb(75, 192, 192, 1)",
    ],
    hoverOffset: 4,
    borderWidth: 1
    }]
};
const options4 = {
      responsive: true,
      maintainAspectRatio: true,
      layout: {
        padding: 10
      }
    };
  new Chart(ctx4, {
    type: 'pie',
    data: SebaranData,
    options: options4,
  });
</script>

<script>
  const ctx3 = document.getElementById('chartabsen');
  const absenfromdb = JSON.parse('{!! json_encode($total_data) !!}');
  const absenlabels = JSON.parse('{!! json_encode($all_month) !!}');
  const absendata = {
  labels: absenlabels,
  datasets: [{
    label: 'Total Absen Masuk',
    data: absenfromdb,
    fill: false,
    borderColor: [
      'rgb(255, 99, 132)',
    ],
    tension: 0.1
  }]
};
const options5 = {
      responsive: true,
      maintainAspectRatio: true,
      layout: {
        padding: 10
      }
    };
  new Chart(ctx3, {
    type: 'line',
    data: absendata,
    options: options5,
  });
</script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection