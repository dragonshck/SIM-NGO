@extends('main')

@section('createdatasponsorheader')
<div class="row">
    <div class="col-12">
      <div class="card mb-3 btn-reveal-trigger">
        <div class="card-header position-relative min-vh-25 mb-8">
          <div class="cover-image">
            <form action="/tambah-data-sponsor" method="POST" enctype="multipart/form-data">
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(../../assets/img/generic/4.jpg);">
            </div>
            <!--/.bg-holder-->
            
            <input class="d-none" id="upload-cover-image" type="file" name="coverprofil">
            <label class="cover-image-file-input" for="upload-cover-image"><svg class="svg-inline--fa fa-camera fa-w-16 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path></svg><!-- <span class="fas fa-camera me-2"></span> Font Awesome fontawesome.com --><span>Change cover photo</span></label>
          </div>
          <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
            <div class="h-100 w-100 rounded-circle overflow-hidden position-relative"> <img src="../../assets/img/team/2.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
              <input class="d-none" id="profile-image" type="file" name="fotoprofil">
              <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><svg class="svg-inline--fa fa-camera fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path></svg><!-- <span class="fas fa-camera"></span> Font Awesome fontawesome.com --><span class="d-block">Update</span></span></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('createdatasponsorcontent')
<div class="row g-0">
    <div class="col-lg-12">
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="mb-0">Profile Settings</h5>
        </div>
        <div class="card-body bg-light">
            @csrf
            <div class="col-lg-8">
              <label class="form-label" for="full-name">Full Name</label>
              <input class="form-control" id="full-name" type="text" name="nama_sponsor">
            </div>
            <div class="col-lg-8">
              <label class="form-label" for="home-addr">Origin Country</label>
              <input class="form-control" id="home-addr" type="text" name="origincountry">
            </div>
            <div class="col-12 d-flex justify-content-end">
              <button class="btn btn-primary" type="submit">Add </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection