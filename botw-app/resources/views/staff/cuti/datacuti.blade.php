@extends('main')
@section('cutibang')
<div class="card mb-3" id="ordersTable" data-list="{&quot;valueNames&quot;:[&quot;order&quot;,&quot;date&quot;,&quot;address&quot;,&quot;status&quot;,&quot;amount&quot;],&quot;page&quot;:10,&quot;pagination&quot;:true}">
    <div class="card-header">
      <div class="row flex-between-center">
        <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Daftar Cuti Staff</h5>
        </div>
        <div class="col-8 col-sm-auto ms-auto text-end ps-0">
          <div class="d-none" id="orders-bulk-actions">
            <div class="d-flex">
              <select class="form-select form-select-sm" aria-label="Bulk actions">
                <option selected="">Bulk actions</option>
                <option value="Refund">Refund</option>
                <option value="Delete">Delete</option>
                <option value="Archive">Archive</option>
              </select>
              <button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button>
            </div>
          </div>
          <div id="orders-actions">
            <a class="btn btn-falcon-default btn-sm" type="button" href="/cuti-tambah"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">New</span></a>
            {{-- <a class="btn btn-falcon-default btn-sm mx-2" type="button"><svg class="svg-inline--fa fa-filter fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Filter</span></a>
            <a class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-external-link-alt fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Export</span></a> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive scrollbar">
        <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
          <thead class="bg-200 text-900">
            <tr>
              <th>
                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                  <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox" data-bulk-select="{&quot;body&quot;:&quot;table-orders-body&quot;,&quot;actions&quot;:&quot;orders-bulk-actions&quot;,&quot;replacedElement&quot;:&quot;orders-actions&quot;}">
                </div>
              </th>
              <th class="sort pe-1 align-middle white-space-nowrap" data-sort="order">Permintaan</th>
              <th class="sort pe-1 align-middle white-space-nowrap pe-7" data-sort="date">Tanggal Selesai</th>
              <th class="sort pe-1 align-middle white-space-nowrap" data-sort="address" style="min-width: 12.5rem;">Alasan</th>
              <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="status">Status</th>
              <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">Durasi</th>
              <th class="no-sort"></th>
            </tr>
          </thead>
          <tbody class="list" id="table-orders-body">
            @foreach ($collection as $index =>$item)
            <tr class="btn-reveal-trigger">
              <td class="align-middle" style="width: 28px;">
                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                  <input class="form-check-input" type="checkbox" id="checkbox-0" data-bulk-select-row="data-bulk-select-row">
                </div>
              </td>
              <td class="order py-2 align-middle white-space-nowrap">
                <a href="/detail-cuti/{{ $item -> id }}"> <strong>{{ $item -> cuti2staff -> nama }}</strong></a> /
                  <strong>{{ $item-> cuti2staff -> rolekaryawan -> name }}</strong>
                {{-- <a href="mailto:ricky@example.com">ricky@example.com</a> --}}
              </td>
              <td class="date py-2 align-middle">{{ $item -> tgl_selesai }}</td>
              <td class="address py-2 align-middle white-space-nowrap">
                <p class="mb-0 text-500">{{ $item -> keterangan }}</p>
              </td>
              <td class="status py-2 align-middle text-center fs-0 white-space-nowrap">
                <span class="badge badge rounded-pill d-block {{ ($item -> status == 1) ? 'badge-soft-success' : 'badge-soft-warning' }}">{{ ($item -> status == 1) ? 'Accepted' : 'Pending' }}</span>
                {{-- <span class="badge badge rounded-pill d-block {{ ($item -> status_transaksi == 1) ? 'badge-soft-success' : 'badge-soft-warning' }}">{{ ($item -> status_transaksi == 1) ? 'Complete' : 'Pending' }}</span> --}}
              </td>
              <td class="amount py-2 align-middle text-end fs-0 fw-medium">
                {{$hari_cuti[$index]}}
              </td>
              <td class="py-2 align-middle white-space-nowrap text-end">
                @if(Auth::check() && Auth::user()->role_id == 1)
                <div class="dropdown font-sans-serif position-static">
                  <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--1"></span> Font Awesome fontawesome.com --></button>
                  <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                    <div class="bg-white py-2">
                      {{-- <a class="dropdown-item" onclick="setComplete(event, '{{ $item -> id }}', 'completed')">Accepted</a>
                      <a class="dropdown-item" onclick="setComplete(event, '{{ $item -> id }}', 'pending')">Pending</a> --}}

                      <a class="dropdown-item" href="{{ url('/ubah-status-cuti/' . $item ->id)  }}">Accepted</a>
                      <a class="dropdown-item" href="{{ url('/ubah-status-cuti/' . $item ->id)  }}">Pending</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/detail-cuti/{{ $item -> id }}">View</a>
                      {{-- <a class="dropdown-item text-danger" href="/hapus-penerimaan-sponsor/{{ $item -> id }}">Delete</a> --}}
                    </div>
                  </div>
                </div>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer">
      <div class="d-flex align-items-center justify-content-center">
        
      </div>
    </div>
  </div>
@endsection

@section('js')
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
@endsection