@extends('layouts.main')
@section('dataabsenanak')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <div class="row flex-between-center">
                  <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Data Absensi Anak</h5>
                  </div>
                  <div class="col-8 col-sm-auto text-end ps-2">
                    @can('read access tutor')
                    <div id="table-customers-replace-element">
                      <a class="btn btn-falcon-default btn-sm" type="button" href="{{ route('absenanak.create') }}"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><span class="d-none d-sm-inline-block ms-1">Mulai Absen</span></a>
                    </div>
                    @endcan
                  </div>
                </div>
              </div>
            <div class="table-responsive scrollbar">
                <table class="table table-striped overflow-hidden">
                  <thead>
                    <tr class="btn-reveal-trigger">
                      <th scope="col">Detail</th>
                      <th scope="col">Periode</th>
                      <th class="text-end" scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                    <tr class="btn-reveal-trigger">
                      <td>
                        <a class="btn btn-outline-success btn-sm" type="button" href="{{ route('absenanak.show', $item->periode) }}">View Absen
                        </a>
                      </td>
                      <td>{{ \Carbon\Carbon::parse($item->tanggal_absen)->format('F Y') }}</td>
                      <td class="text-end">
                        <div class="dropdown font-sans-serif position-static">
                          
                          <div class="dropdown-menu dropdown-menu-end border py-0">
                            <div class="bg-white py-2">
                              
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
@endsection