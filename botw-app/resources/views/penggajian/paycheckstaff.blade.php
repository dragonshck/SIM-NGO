@extends('main')
@section('listgaji')
    <div class="card">
        <div class="card-header">
            <div class="row flex-between-center">
              <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Recent Paycheck </h5>
              </div>
              <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                <div id="table-purchases-replace-element">
                  <a class="btn btn-falcon-default btn-sm" type="button" href="/tambah-penggajian"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">New</span></a>
                  {{-- <button class="btn btn-falcon-default btn-sm mx-2" type="button"><svg class="svg-inline--fa fa-filter fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Filter</span></button> --}}
                  <button class="btn btn-falcon-default btn-sm mx-2" type="button"><svg class="svg-inline--fa fa-external-link-alt fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Export</span></button>
                </div>
              </div>
            </div>
          </div>
        <div class="card-body">
          <div class="table-responsive scrollbar">
            <table class="table table-hover table-striped overflow-hidden">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Jabatan</th>
                  <th scope="col">Salary Total</th>
                  <th scope="col">Status</th>
                  <th class="text-end" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="align-middle">
                  @foreach ($data_gaji as $item)
                  
                  <td class="text-nowrap">
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-xl">
                        <img class="rounded-circle" src="{{ asset('fotostaff/' .$item -> Gaji2Staff -> fotoprofil) }}" alt="" />
                      </div>
                      <div class="ms-2">{{ $item -> Gaji2Staff -> nama }}</div>
                    </div>
                  </td>
                  <td class="text-nowrap">{{ $item -> Gaji2Staff -> rolekaryawan -> name }}</td>
                  <td class="text-nowrap">{{ $item -> total }}</td>
                  <td><span class="badge badge rounded-pill d-block p-2 badge-soft-success">Completed<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                  </td>
                  <td class="text-end">
                    <a class="btn btn-outline-success btn-sm" type="button" href="/detail-penggajian/{{ $item -> id }}">Detail
                    </a>
                  </td>

                  @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
@endsection