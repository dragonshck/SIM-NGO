@extends('layouts.main')
@section('detailcutibang')
<div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-md d-flex">
          <div class="avatar avatar-2xl">
            <img class="rounded-circle" src="{{ asset('images/profile/' . $data_staff -> user -> profile_picture) }}" alt="">
          </div>
          <div class="flex-1 ms-2">
            <h5 class="mb-0">Detail Cuti Staff</h5><a class="text-800 fs--1" href="#!"><span class="fw-semi-bold">{{ $data_staff -> user -> name }}</span><span class="ms-1 text-500">&lt;{{ $collection -> cuti2staff -> jabatan -> nama_jabatan }}&gt;</span></a>
          </div>
        </div>
        <div class="col-md-auto ms-auto d-flex align-items-center ps-6 ps-md-3"><small>{{ $collection -> created_at -> toDayDateTimeString() }}</small></div>
      </div>
    </div>
    <div class="card-body bg-light">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xxl-6">
          <div class="card shadow-none mb-3"><img class="card-img-top" src="{{ asset('bukticuti_staff/' . $collection -> gambar_bukti) }}" alt="">
            <div class="card-body">
              <h3 class="fw-semi-bold">Keterangan Cuti</h3>
              <p>{{ $collection -> keterangan }}</p>
              <p>Tanggal Mulai : {{ \Carbon\Carbon::parse($collection -> tgl_mulai)->format('j F, Y') }}</p>
              <p>Tanggal Selesai : {{ \Carbon\Carbon::parse($collection -> tgl_selesai)->format('j F, Y') }}</p>
              {{-- <div class="text-center">
                <button class="btn btn-success btn-lg my-3" type="button">Browse Courses</button><small class="d-block">For any technical issues faced, please contact <a href="#!">Customer Support</a>.</small>
              </div> --}}
            </div>
          </div>
          {{-- <div class="text-center">
            <div class="icon-group justify-content-center"><a class="icon-item text-facebook" href="#!"><svg class="svg-inline--fa fa-facebook-f fa-w-10" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg><!-- <span class="fab fa-facebook-f"></span> Font Awesome fontawesome.com --></a><a class="icon-item text-twitter" href="#!"><svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <span class="fab fa-twitter"></span> Font Awesome fontawesome.com --></a><a class="icon-item text-google-plus" href="#!"><svg class="svg-inline--fa fa-google-plus-g fa-w-20" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-plus-g" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M386.061 228.496c1.834 9.692 3.143 19.384 3.143 31.956C389.204 370.205 315.599 448 204.8 448c-106.084 0-192-85.915-192-192s85.916-192 192-192c51.864 0 95.083 18.859 128.611 50.292l-52.126 50.03c-14.145-13.621-39.028-29.599-76.485-29.599-65.484 0-118.92 54.221-118.92 121.277 0 67.056 53.436 121.277 118.92 121.277 75.961 0 104.513-54.745 108.965-82.773H204.8v-66.009h181.261zm185.406 6.437V179.2h-56.001v55.733h-55.733v56.001h55.733v55.733h56.001v-55.733H627.2v-56.001h-55.733z"></path></svg><!-- <span class="fab fa-google-plus-g"></span> Font Awesome fontawesome.com --></a><a class="icon-item text-linkedin" href="#!"><svg class="svg-inline--fa fa-linkedin-in fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg><!-- <span class="fab fa-linkedin-in"></span> Font Awesome fontawesome.com --></a><a class="icon-item text-700" href="#!"><svg class="svg-inline--fa fa-medium-m fa-w-16" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="medium-m" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M71.5 142.3c.6-5.9-1.7-11.8-6.1-15.8L20.3 72.1V64h140.2l108.4 237.7L364.2 64h133.7v8.1l-38.6 37c-3.3 2.5-5 6.7-4.3 10.8v272c-.7 4.1 1 8.3 4.3 10.8l37.7 37v8.1H307.3v-8.1l39.1-37.9c3.8-3.8 3.8-5 3.8-10.8V171.2L241.5 447.1h-14.7L100.4 171.2v184.9c-1.1 7.8 1.5 15.6 7 21.2l50.8 61.6v8.1h-144v-8L65 377.3c5.4-5.6 7.9-13.5 6.5-21.2V142.3z"></path></svg><!-- <span class="fab fa-medium-m"></span> Font Awesome fontawesome.com --></a></div><small>If you wish to unsubscribe from all future emails, please click <a href="#!">here</a>.</small>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="card-footer">
      {{-- <div class="row justify-content-between">
        <div class="col">
            <a class="btn btn-falcon-default btn-sm" href="../../app/email/compose.html"><svg class="svg-inline--fa fa-reply fa-w-16" data-fa-transform="down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="reply" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M8.309 189.836L184.313 37.851C199.719 24.546 224 35.347 224 56.015v80.053c160.629 1.839 288 34.032 288 186.258 0 61.441-39.581 122.309-83.333 154.132-13.653 9.931-33.111-2.533-28.077-18.631 45.344-145.012-21.507-183.51-176.59-185.742V360c0 20.7-24.3 31.453-39.687 18.164l-176.004-152c-11.071-9.562-11.086-26.753 0-36.328z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-reply" data-fa-transform="down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Reply</span></a><a class="btn btn-falcon-default btn-sm ms-2" href="../../app/email/compose.html"><svg class="svg-inline--fa fa-location-arrow fa-w-16" data-fa-transform="down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-arrow" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M444.52 3.52L28.74 195.42c-47.97 22.39-31.98 92.75 19.19 92.75h175.91v175.91c0 51.17 70.36 67.17 92.75 19.19l191.9-415.78c15.99-38.39-25.59-79.97-63.97-63.97z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-location-arrow" data-fa-transform="down-2"></span> Font Awesome fontawesome.com --><span class="d-none d-sm-inline-block ms-1">Forward</span></a></div>
      </div> --}}
    </div>
  </div>
@endsection