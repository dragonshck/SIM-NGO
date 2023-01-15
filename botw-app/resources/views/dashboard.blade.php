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