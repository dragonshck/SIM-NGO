@section('sponsorshipview')
<div class="row g-3 mb-3">
    <div class="col-lg-6">
        <div class="card">
          <div class="card-header d-flex flex-between-center bg-light py-2">
            <h6 class="mb-0">Sponsorship</h6>
            <div class="dropdown font-sans-serif btn-reveal-trigger">
              <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-active-user" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-active-user"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
              </div>
            </div>
          </div>
          <div class="card-body py-2">
            <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2"><a href="#!">
              <h6 class="mb-0"><svg class="svg-inline--fa fa-circle fa-w-16 fs--1 me-3 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <span class="fas fa-circle fs--1 me-3 text-primary"></span> Font Awesome fontawesome.com -->TK</h6></a><a class="fs--2 text-600 mb-0" href="#!">Rp.{{ $sumtk }}</a>
            </div>
            <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2"><a href="#!">
              <h6 class="mb-0"><svg class="svg-inline--fa fa-circle fa-w-16 fs--1 me-3 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <span class="fas fa-circle fs--1 me-3 text-primary"></span> Font Awesome fontawesome.com -->SD</h6></a><a class="fs--2 text-600 mb-0" href="#!">Rp.{{ $sumsd }}</a>
            </div>
            <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2"><a href="#!">
              <h6 class="mb-0"><svg class="svg-inline--fa fa-circle fa-w-16 fs--1 me-3 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <span class="fas fa-circle fs--1 me-3 text-primary"></span> Font Awesome fontawesome.com -->SMP</h6></a><a class="fs--2 text-600 mb-0" href="#!">Rp.{{ $sumsmp }}</a>
            </div>
            <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2"><a href="#!">
              <h6 class="mb-0"><svg class="svg-inline--fa fa-circle fa-w-16 fs--1 me-3 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <span class="fas fa-circle fs--1 me-3 text-primary"></span> Font Awesome fontawesome.com -->SMA / K - Kuliah</h6></a><a class="fs--2 text-600 mb-0" href="#!">Rp.{{ $sumsmk }}</a>
            </div>
          </div>
          <div class="card-footer bg-light p-0">
            {{-- <a class="btn btn-sm btn-link d-block w-100 py-2" href="app/social/followers.html">All active users<svg class="svg-inline--fa fa-chevron-right fa-w-10 ms-1 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg><!-- <span class="fas fa-chevron-right ms-1 fs--2"></span> Font Awesome fontawesome.com --></a> --}}
          </div>
        </div>
    </div>
    <div class="col-lg-6">
          <div class="card h-100">
            <div class="card-header bg-light d-flex flex-between-center py-2">
              <h6 class="mb-0">Distribution</h6>
              <div class="dropdown font-sans-serif btn-reveal-trigger">
                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-bandwidth-saved" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
                <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-bandwidth-saved"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                </div>
              </div>
            </div>
            <div class="card-body d-flex flex-center flex-column" style="width: 381px; height:350px;">
              <!-- Find the JS file for the following chart at: src/js/charts/echarts/bandwidth-saved.js-->
              <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
              <canvas id="maklo" width="350"></canvas>
            </div>
            <div class="card-footer bg-light py-2">
              <div class="row flex-between-center">
                <div class="col-auto">
                  {{-- <select class="form-select form-select-sm">
                    <option>Last 6 Months</option>
                    <option>Last Year</option>
                    <option>Last 2 Year</option>
                  </select> --}}
                </div>
                <div class="col-auto"></div>
              </div>
            </div>
          </div>
        </div>
  </div>
@endsection


@section('chartpie')

{{-- Chart Sponsorship --}}
<script>
  const ctx2 = document.getElementById('maklo');
  const SponsorLabel = JSON.parse('{!! json_encode($maplabelsponsor) !!}');
  const SponsorDataMap = JSON.parse('{!! json_encode($mapdatadistribusisponsor) !!}');
  const SponsorData = {
    labels : SponsorLabel,
    datasets: [{
    label: 'Sebaran Penerimaan Hadiah Sponsor',
    data: SponsorDataMap,
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
const options2 = {
      responsive: true,
      maintainAspectRatio: true,
      layout: {
        padding: 10
      }
    };

  new Chart(ctx2, {
    type: 'pie',
    data: SponsorData,
    options: options2,
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection