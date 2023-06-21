@extends('layouts.main')
@section('detailabsenanak')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><svg class="svg-inline--fa fa-circle fa-w-16 fa-stack-2x text-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-stack-2x text-300"></i> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-spinner fa-w-16 fa-inverse fa-stack-1x text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg><!-- <i class="fa-inverse fa-stack-1x text-primary fas fa-spinner"></i> Font Awesome fontawesome.com --></span>
    <div class="col">
      <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Rekap Absensi</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
      <p class="mb-0">Periode : {{ \Carbon\Carbon::parse($tahun)->format('F') }}</p>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-end">
              <div class="mx-3">
                {{-- <a class="btn btn-falcon-default btn-sm" type="button" href="">Export to Excel</a> --}}
              </div>
          </div>
        <div class="table-responsive scrollbar">
            <table class="table overflow-hidden table-stripped">
              <thead>
                @php
                $count = count($all_periode);
                    $total = 0;
                @endphp
                <tr class="btn-reveal-trigger">
                  <th scope="col" rowspan="2">Nama Anak</th>
                  <th scope="col" class="center" colspan="{{$count}}">Tanggal Absen</th>
                  <th scope="col" rowspan="2">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  @foreach ($all_periode as $index => $periode)
                  <td>{{$index+1}}</td>
                  @endforeach
                </tr>
                @foreach ($data as $item) 
                @php
                $year = date('Y', strtotime($item->tanggal_absen));
                $absensi = App\Http\Controllers\AbsensiAnakController::getAnakByDate($item->anak_p_p_a_id, $year, $item->periode);
                @endphp
                <tr class="btn-reveal-trigger">
                  <td>{{ $item -> anakabsen -> user -> name }}</td>

                  @foreach($absensi as $index2 => $item_absen)
                  @if (!empty($item_absen['status_absen']))

                    @if ($item_absen['status_absen'] == 1)
                    @php
                      $total++;
                    @endphp
                    <td><span class="fas fa-check"></span></td>
                    @elseif($item_absen['status_absen'] == 2)
                    <td>AS</td>
                    
                    @elseif($item_absen['status_absen'] == 3)
                    <td>DK</td>

                    @elseif($item_absen['status_absen'] == 4)
                    <td>JB</td>

                    @elseif($item_absen['status_absen'] == 5)
                    <td>KM</td>
                    @elseif($item_absen['status_absen'] == 6)
                    <td>KC</td>
                    @elseif($item_absen['status_absen'] == 7)
                    <td>KD</td>
                    @elseif($item_absen['status_absen'] == 8)
                    <td>KK</td>
                    @elseif($item_absen['status_absen'] == 9)
                    <td>SM</td>
                    @elseif($item_absen['status_absen'] == 10)
                    <td>LL</td>
                    @elseif($item_absen['status_absen'] == 11)
                    <td>AM</td>
                        
                    @endif
                  @else
                    <td></td>
                  @endif

                  @endforeach
                  <td>{{ $total}}</td>
                </tr>
                @php
                $total = 0;    
                  @endphp
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
  </div>
@endsection