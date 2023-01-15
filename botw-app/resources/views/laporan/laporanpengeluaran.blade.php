@extends('layouts.main')
@section('lappengeluaran')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><svg class="svg-inline--fa fa-circle fa-w-16 fa-stack-2x text-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-stack-2x text-300"></i> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-spinner fa-w-16 fa-inverse fa-stack-1x text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg><!-- <i class="fa-inverse fa-stack-1x text-primary fas fa-spinner"></i> Font Awesome fontawesome.com --></span>
    <div class="col">
      <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Laporan Keuangan</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
      <p class="mb-0">Informasi seputar transaksi pada PPA Kalvari</p>
    </div>
</div>
<div class="row g-3 mb-3">
  <div class="col-lg-6">
      <div class="card">
        <div class="card-header d-flex flex-between-center bg-light py-2">
          <h6 class="mb-0">Expenses</h6>
          <div class="dropdown font-sans-serif btn-reveal-trigger">
            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-active-user" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--2"></span> Font Awesome fontawesome.com --></button>
            <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-active-user"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
              <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
            </div>
          </div>
        </div>
        <div class="card-body py-2">
          <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2"><a href="#!">
            <h6 class="mb-0"><svg class="svg-inline--fa fa-circle fa-w-16 fs--1 me-3 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <span class="fas fa-circle fs--1 me-3 text-primary"></span> Font Awesome fontawesome.com -->Rewards</h6></a><a class="fs--2 text-600 mb-0" href="#!">Rp.{{ $sumrewards }}</a>
          </div>
          <div class="d-flex flex-between-center rounded-3 bg-light p-3 mb-2"><a href="#!">
            <h6 class="mb-0"><svg class="svg-inline--fa fa-circle fa-w-16 fs--1 me-3 text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <span class="fas fa-circle fs--1 me-3 text-primary"></span> Font Awesome fontawesome.com -->Bantuan</h6></a><a class="fs--2 text-600 mb-0" href="#!">Rp.{{ $sumbantuan }}</a>
          </div>
        </div>
        <div class="card-footer bg-light p-0">
          
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
            <canvas id="pengeluaran" width="350"></canvas>
          </div>
          <div class="card-footer bg-light py-2">
            <div class="row flex-between-center">
              <div class="col-auto">
                
              </div>
              <div class="col-auto"></div>
            </div>
          </div>
        </div>
      </div>
</div>

@include('laporan.chartsponsorship')
        
@endsection

@section('charts')

{{-- Chart Pengeluaran --}}
<script>
  const ctx1 = document.getElementById('pengeluaran');
  const ExpensesLabel = ['Rewards', 'Bantuan'];
  const ExpensesData2DB = JSON.parse('[{!! json_encode($sumrewards) !!}, {!! json_encode($sumbantuan) !!}]');
  const ExpensesData = {
    labels :ExpensesLabel,
    datasets: [{
    label: 'Sebaran Pengeluaran untuk Anak',
    data: ExpensesData2DB,
    backgroundColor: [
      "rgb(255, 99, 132, 0.2)", "rgb(54, 162, 235, 0.2)",
    ],
    borderColor: [
      "rgb(255, 99, 132, 1)", "rgb(54, 162, 235, 1)",
    ],
    hoverOffset: 4,
    borderWidth: 1,
  }]};

  const options1 = {
      responsive: true,
      maintainAspectRatio: true,
      layout: {
        padding: 10
      }
    };

  new Chart(ctx1, {
    type: 'doughnut',
    data: ExpensesData,
    options: options1
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

