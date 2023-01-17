@extends('layouts.main')

@section('cutialter')
<div class="card mb-3">
<div class="card-header">
  <div class="row flex-between-center">
    <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
      <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Daftar Cuti Staff</h5>
    </div>
    <div class="col-8 col-sm-auto ms-auto text-end ps-0">
      
      <div id="orders-actions">
        <a class="btn btn-falcon-default btn-sm" type="button" href="{{ route('cutiizin.create') }}"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">New</span></a>
        {{-- <a class="btn btn-falcon-default btn-sm mx-2" type="button"><svg class="svg-inline--fa fa-filter fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Filter</span></a>
        <a class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-external-link-alt fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Export</span></a> --}}
      </div>
    </div>
  </div>
</div>
<div class="table-responsive scrollbar">
  <table class="table table-hover table-striped overflow-hidden">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">End Date</th>
        <th scope="col">Alasan</th>
        <th scope="col">Status</th>
        <th class="text-end" scope="col"> </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($collection as $item)
      <tr class="align-middle">
        <td class="text-nowrap">
          <div class="d-flex align-items-center">
            <div class="avatar avatar-xl">
              <img class="rounded-circle" src="{{ ('images/profile/' . $item -> cuti2staff -> user -> profile_picture) }}" alt="" />
            </div>
            <div class="ms-2">{{ $item -> cuti2staff -> user -> name }}</div>
          </div>
        </td>
        <td class="text-nowrap">{{ $item-> cuti2staff -> jabatan -> nama_jabatan }}</td>
        <td class="text-nowrap">{{ \Carbon\Carbon::parse($item -> tgl_selesai)->format('j F, Y') }}</td>
        <td class="text-nowrap">{{ $item -> keterangan }}</td>
        <td>
          @if($item-> status == 1)
          <span class="badge badge rounded-pill d-block p-2 badge-soft-success">Accepted<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
          @else
          <span class="badge badge rounded-pill d-block p-2 badge-soft-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
          @endif
        {{-- <td><span class="badge badge rounded-pill d-block p-2 badge-soft-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span> --}}
          {{-- <span class="badge badge rounded-pill d-block {{ ($item -> status == 1) ? 'badge-soft-success' : 'badge-soft-warning' }}">{{ ($item -> status == 1) ? 'Accepted' : 'Pending' }}</span> --}}
        </td>
        <td class="text-end">
          <td class="py-2 align-middle white-space-nowrap text-end">
            @can('read access koordinator')
            <div class="dropdown font-sans-serif position-static">
              <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--1"></span> Font Awesome fontawesome.com --></button>
              <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                <div class="bg-white py-2">
                  {{-- <a class="dropdown-item" onclick="setComplete(event, '{{ $item -> id }}', 'completed')">Accepted</a>
                  <a class="dropdown-item" onclick="setComplete(event, '{{ $item -> id }}', 'pending')">Pending</a> --}}

                  <a class="dropdown-item" href="{{ url('/ubah-status-lp/' . $item ->id)  }}">Accepted</a>
                  <a class="dropdown-item" href="{{ url('/ubah-status-lp/' . $item ->id)  }}">Pending</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('cutiizin.show', $item -> id) }}">View</a>
                  {{-- <a class="dropdown-item text-danger" href="/hapus-penerimaan-sponsor/{{ $item -> id }}">Delete</a> --}}
                </div>
              </div>
            </div>
            @endcan
          </td>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection

{{-- @section('js')
<script>
    function setComplete(event, id, status) {
      console.log('test', event, id)
      $.ajax({
        type:'post',
        url:"{{ url('/ubah-status') }}/"+id,
        data:{
          _token:'{{ csrf_token() }}', 
          status
        },
        success:function(res){
          if(res) {
            // console.log(res)
            location.reload()
          }
        }
      })
    }
  </script>
@endsection --}}