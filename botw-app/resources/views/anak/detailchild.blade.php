@extends('layouts.main')

@section('detaildataanak')
<div class="row g-0">
  <div class="card mb-3">
    <div class="card-header position-relative min-vh-25 mb-7">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url('')">
      </div>
      <!--/.bg-holder-->
      <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{ asset('images/profile/' . $data -> profile_picture)}}" width="200" alt=""></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1"> {{ $data -> name }}<span data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Verified" aria-label="Verified"><svg class="svg-inline--fa fa-check-circle fa-w-16 text-primary" data-fa-transform="shrink-4 down-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path></g></g></svg><!-- <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small> Font Awesome fontawesome.com --></span>
          </h4>
          
            <h5 class="fs-0 fw-normal">{{ $data -> ku_description }}</h5>
          
          <p class="text-500">{{ $data -> current_addr }}</p>
          @can('read access mentor')
          <a class="btn btn-falcon-info btn-sm px-3" type="button" href="{{ route('anak.edit', $id) }}">Edit</a>
          <a class="btn btn-falcon-danger btn-sm px-3 ms-2" type="button" href="{{ route('anak.destroy', $id) }}">Delete</a>
          @endcan
          <div class="border-dashed-bottom my-4 d-lg-none"></div>
        </div>
      </div>
    </div>
  </div>

  
  <div class="col-lg-8 pe-lg-2">
    <div class="card mb-3">
      <div class="card-header bg-light">
        <h5 class="mb-0">Intro</h5>
      </div>
      <div class="card-body text-justify">
        <div class="mb-3 row">
        <label class="col-sm-2 col-form-label" for="staticEmail">Telp</label>
        <div class="col-sm-10">
          <input class="form-control-plaintext outline-none" id="staticEmail" type="text" readonly="" value="{{ $data -> phone }}" />
          <div class="mb-3 row"></div>
        </div>
        <label class="col-sm-2 col-form-label" for="staticEmail">Tgl Lahir</label>
        <div class="col-sm-10">
          <input class="form-control-plaintext outline-none" id="staticEmail" type="text" readonly="" value="{{ \Carbon\Carbon::parse($data -> dateob)->format('j F, Y') }}" />
          <div class="mb-3 row"></div>
        </div>
        <label class="col-sm-2 col-form-label" for="staticEmail">Gender</label>
            <div class="col-sm-10">
              <input class="form-control-plaintext outline-none" id="staticEmail" type="text" readonly="" value="{{ $data -> gender }}" />
              <div class="mb-3 row"></div>
            </div>
      
        <div class="collapse show" id="profile-intro" style="">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label" for="staticEmail">Email</label>
            <div class="col-sm-10">
              <input class="form-control-plaintext outline-none" id="staticEmail" type="text" readonly="" value="{{ $data -> email }}" />
              <div class="mb-3 row"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="card-footer bg-light p-0 border-top">
        <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show <span class="less">less<svg class="svg-inline--fa fa-chevron-up fa-w-14 ms-2 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg><!-- <span class="fas fa-chevron-up ms-2 fs--2"></span> Font Awesome fontawesome.com --></span><span class="full">full<svg class="svg-inline--fa fa-chevron-down fa-w-14 ms-2 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg><!-- <span class="fas fa-chevron-down ms-2 fs--2"></span> Font Awesome fontawesome.com --></span></button>
      </div>
    </div>
  </div>

  
  <div class="col-lg-4 ps-lg-2">
        <div class="sticky-sidebar">
          <div class="card mb-3">
            <div class="card-header bg-light">
              <h5 class="mb-0">Sponsor</h5>
            </div>
            <div class="card-body fs--1">
              <div class="d-flex"><a href="#!"> <img class="img-fluid" src="{{ asset('images/profile/' . $data -> fotoprofil) }}" alt="" width="56"></a>
                <div class="flex-1 position-relative ps-3">
                  <h6 class="fs-0 mb-0">{{ $data -> nama_sponsor }}<span data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Verified" aria-label="Verified"><svg class="svg-inline--fa fa-check-circle fa-w-16 text-primary" data-fa-transform="shrink-4 down-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path></g></g></svg><!-- <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small> Font Awesome fontawesome.com --></span>
                  </h6>
                  <p class="text-1000 mb-0"></p>
                  <p class="text-1000 mb-0">{{ $data -> origin_country }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

  
@endsection