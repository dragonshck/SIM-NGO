@extends('layouts.main')
@section('listpenerimaansponsor')
<div class="card z-index-1 mb-3" id="recentPurchaseTable" data-list="{&quot;valueNames&quot;:[&quot;name&quot;,&quot;email&quot;,&quot;product&quot;,&quot;payment&quot;,&quot;amount&quot;],&quot;page&quot;:8,&quot;pagination&quot;:true}">
  <div class="card-header">
    <div class="row flex-between-center">
      <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Penerimaan Hadiah Sponsor Anak</h5>
      </div>
      <div class="col-6 col-sm-auto ms-auto text-end ps-0">
        <div class="d-none" id="table-purchases-actions">
        </div>
        <div id="table-purchases-replace-element">
          @can('read access bendahara')
          <a href="{{ route('hadiahsponsor.create') }}" class="btn btn-falcon-default btn-sm" type="button"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">New</span></a>
          @endcan
        </div>
      </div>
    </div>
  </div>
  <div class="card-body px-0 py-0">
    <div class="table-responsive scrollbar">
      <table class="table table-sm fs--1 mb-0 overflow-hidden">
        <thead class="bg-200 text-900">
          <tr>
            
            <th class="sort pe-1 align-middle white-space-nowrap" >Nama Anak</th>
            <th class="sort pe-1 align-middle white-space-nowrap" >Transaksi</th>
            <th class="sort pe-1 align-middle white-space-nowrap" >Keterangan Transaksi</th>
            <th class="sort pe-1 align-middle white-space-nowrap" >Amount</th>
            <th class="sort pe-1 align-middle white-space-nowrap" >Status</th>
            <th class="no-sort pe-1 align-middle data-table-row-action"></th>
          </tr>
        </thead>
        <tbody class="list" id="table-purchase-body">
          @foreach ($collection as $item)
          <tr class="btn-reveal-trigger">
              <th class="align-middle white-space-nowrap">{{ $item -> hadiahanak -> user -> name }}</th>
              <td class="align-middle white-space-nowrap ">{{ $item -> nama_hadiah }}</td>
              <td class="align-middle white-space-nowrap ">{{ $item -> keterangan_hadiah }}</td>
              <td class="align-middle white-space-nowrap">@currency($item -> amount_hadiah)</td>
              <td class="align-middle white-space-nowrap text-end ">
                @if($item-> status_hadiah == 1)
                <span class="badge badge rounded-pill d-block p-2 badge-soft-success">Completed<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                @else
                <span class="badge badge rounded-pill d-block p-2 badge-soft-warning">Process<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                @endif
              </td>
              <td class="align-middle white-space-nowrap text-end">
                
                <div class="dropstart font-sans-serif position-static d-inline-block">
                  <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown5" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--1"></span> Font Awesome fontawesome.com --></button>
                  <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown5">
                    @can('read access bendahara')
                    <a class="dropdown-item" href="{{ url('/ubah-status-hadiah/' . $item -> id)  }}">Completed</a>
                    <a class="dropdown-item" href="{{ url('/ubah-status-hadiah/' . $item -> id)  }}">Process</a>
                    <div class="dropdown-divider"></div>
                    @endcan
                    <a class="dropdown-item" href="{{ route('hadiahsponsor.show', $item -> id) }}">View</a>
                  </div>
                </div>
                
              </td>
          </tr>
          @endforeach
      </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer">
    <div class="row align-items-center">
      
    </div>
  </div>
</div>
@endsection

{{-- @section('js')
    <script>
      function setComplete(event, id, status) {
        // console.log('test', event, id)
        $.ajax({
          type:'post',
          url:"{{ url('/edit-status') }}/"+id,
          data:{
            _token:'{{ csrf_token() }}', 
            status
          },
          success:function(res){
            if(res) {
              console.log(res)
              location.reload()
            }
          }
        })
      }
    </script>
@endsection --}}