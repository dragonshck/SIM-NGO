@extends('layouts.main')
@section('filterabsen')
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <div class="row flex-between-center">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" id="form-grid-layout">Data Absensi Anak</h5>
                        <p class="mb-0 mt-2 mb-0">Pilih Bulan pada isian dibawah untuk melihat absensi..</p>
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

              <form class="row g-3">
                <div class="col-md-12">
                    <select class="form-select" aria-label="Default select example" id="pilihBulan">
                        <option selected="">Pilih Bulan</option>
                        <option value="January">Januari</option>
                        <option value="February">Februari</option>
                        <option value="March">Maret</option>
                        <option value="April">April</option>
                        <option value="May">Mei</option>
                        <option value="June">Juni</option>
                        <option value="July">Juli</option>
                        <option value="August">Agustus</option>
                        <option value="September">September</option>
                        <option value="October">Oktober</option>
                        <option value="November">November</option>
                        <option value="December">Desember</option>
                      </select>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="button" id="lihatAbsen">Lihat Absen</button>
                </div>
              </form>
        </div>
    </div>
@endsection

@section('rangebulan')
<script type="text/javascript">
        $(document).ready(function(){
          $("#lihatAbsen").on('click', function() {
                // e.preventDefault()
                var selectedMonth = $('#pilihBulan option:selected').val();
                
                var periodeAbsen = {!! $data->pluck('periode')->toJson() !!};
                var url = '';
                periodeAbsen.forEach(function(periodeAbsen) {
                    if (periodeAbsen === selectedMonth) {
                      url = "{{ route('absenanak.show', ':periode') }}";
                      url = url.replace(':periode', periodeAbsen);
                    }
                });
                console.log('url', url)
                if (url !== '') {
                    window.location.href = url;
                } else {
                    alert('Data not found for selected month.');
                }
            });
        });
    </script>
@endsection