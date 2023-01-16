<style>
	.demo {
		border:1px solid #C0C0C0;
		border-collapse:collapse;
		padding:5px;
	}
	.demo th {
		border:1px solid #C0C0C0;
		padding:5px;
		background:#F0F0F0;
	}
	.demo td {
		border:1px solid #C0C0C0;
		padding:5px;
	}
</style>
<table class="demo">
	<caption>Slip Gaji untuk : {{ $gaji -> staff -> user -> name }}</caption>
	<thead>
	<tr>
		<th>Gaji Pokok</th>
		<th>Transportasi</th>
		<th>Uang Makan</th>
		<th>Lembur</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>@currency($gaji -> staff -> jabatan -> gaji_pokok)</td>
		<td>@currency($gaji -> staff -> jabatan -> tunjangan_kendaraan)</td>
		<td>@currency($gaji -> staff -> jabatan -> tunjangan_makanan)</td>
		<td>@currency($total_lembur)</td>
	</tr>
	</tbody>
</table>

<table>
  <tbody>
  <tr >
    <th>Total:</th>
    <td>@currency($gaji -> total)</td>
  </tr>
</tbody></table>
  
  
  {{-- <div class="card mb-3">
    <div class="card-body">
      <div class="row align-items-center text-center mb-3">
        <div class="col-sm-6 text-sm-start"><img src="{{ asset('assets/dawn.png') }}" alt="invoice" width="150"></div>
        <div class="col text-sm-end mt-3 mt-sm-0">
          <h2 class="mb-3">Invoice</h2>
          <h5>PPA Kalvari - IO 868</h5>
          <p class="fs--1 mb-0">Jl. Werkudoro No.33, Polehan, Kec. Blimbing <br> Kota Malang, Jawa Timur 65121</p>
        </div>
        <div class="col-12">
          <hr>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col">
          <h6 class="text-500">Invoice to</h6>
          <h5>{{ $gaji -> staff -> user -> name }}</h5>
          <p class="fs--1">{{ $gaji -> staff -> current_addr }}</p>
          <p class="fs--1">{{ $gaji -> staff -> email }}<br>{{ $gaji -> staff -> phone }}</p>
        </div>
        <div class="col-sm-auto ms-auto">
          <div class="table-responsive">
            <table class="table table-sm table-borderless fs--1">
              <tbody>
                <tr>
                  <th class="text-sm-end">Invoice No:</th>
                  <td>{{ $gaji -> id }}</td>
                </tr>
                <tr>
                  <th class="text-sm-end">Tanggal Gaji:</th>
                  <td>{{ \Carbon\Carbon::parse($gaji -> tgl_salary)->format('j F, Y') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="table-responsive scrollbar mt-4 fs--1">
        <table class="table table-striped border-bottom">
          <thead class="light">
            <tr class="bg-primary text-white dark__bg-1000">
              <th class="border-0"></th>
              <th class="border-0 text-center">Gaji Pokok</th>
              <th class="border-0 text-center">Transportasi</th>
              <th class="border-0 text-center">Uang Makan</th>
              <th class="border-0 text-end">Gaji Lembur</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="align-middle">
                <h6 class="mb-0 text-nowrap"></h6>
              </td>
              <td class="align-middle text-center">@currency($gaji -> staff -> jabatan -> gaji_pokok)</td>
              <td class="align-middle text-center">@currency($gaji -> staff -> jabatan -> tunjangan_kendaraan)</td>
              <td class="align-middle text-center">@currency($gaji -> staff -> jabatan -> tunjangan_makanan)</td>
              <td class="align-middle text-end">@currency($total_lembur)</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row justify-content-end">
        <div class="col-auto">
          <table class="table table-sm table-borderless fs--1 text-end">
            <tbody>
            <tr class="border-top border-top-2 fw-bolder text-900">
              <th>Total:</th>
              <td>@currency($gaji -> total)</td>
            </tr>
          </tbody></table>
        </div>
      </div>
    </div>
    <div class="card-footer bg-light">
      <p class="fs--1 mb-0"><strong>Notes: </strong>Jika ada kesalahan data, mohon beritahu Koordinator segera!</p>
    </div>
  </div> --}}
