@extends('layouts.main')
@section('detailstaff')
<div class="card mb-3">
    <div class="card-header position-relative min-vh-25 mb-7">
      <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(../../assets/img/generic/4.jpg);">
      </div>
      <!--/.bg-holder-->

      <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{ asset('images/profile/' . $staff -> user -> profile_picture)  }}" width="200" alt=""></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1"> {{ $staff -> user -> name}} <span data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="Verified" aria-label="Verified"><svg class="svg-inline--fa fa-check-circle fa-w-16 text-primary" data-fa-transform="shrink-4 down-2" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path></g></g></svg><!-- <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small> Font Awesome fontawesome.com --></span>
          </h4>
          <h5 class="fs-0 fw-normal">{{ $staff -> jabatan -> nama_jabatan }}</h5>
          <p class="text-500">{{ $staff -> current_addr }}</p>
          <a class="btn btn-falcon-primary btn-sm px-3" type="button" href="{{ route('staffppa.edit', $staff-> id)}}">Edit</a>
          <div class="border-dashed-bottom my-4 d-lg-none"></div>
        </div>
        <div class="col ps-2 ps-lg-3">
            
              
        </div>
      </div>
    </div>
  </div>

  <div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
        <div class="card mb-3">
          <div class="card-header bg-light">
            <h5 class="mb-0">Intro</h5>
          </div>
          <div class="card-body text-justify">
            {{-- <p class="mb-0 text-1000">Dedicated, passionate, and accomplished Full Stack Developer with 9+ years of progressive experience working as an Independent Contractor for Google and developing and growing my educational social network that helps others learn programming, web design, game development, networking.</p>
            <div class="collapse show" id="profile-intro">
              <p class="mt-3 text-1000">I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. </p>
              <p class="text-1000">It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face.</p>
              <p class="text-1000 mb-0">There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</p>
            </div> --}}
          </div>
          <div class="card-footer bg-light p-0 border-top">
            <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Show <span class="less">less<svg class="svg-inline--fa fa-chevron-up fa-w-14 ms-2 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path></svg><!-- <span class="fas fa-chevron-up ms-2 fs--2"></span> Font Awesome fontawesome.com --></span><span class="full">full<svg class="svg-inline--fa fa-chevron-down fa-w-14 ms-2 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path></svg><!-- <span class="fas fa-chevron-down ms-2 fs--2"></span> Font Awesome fontawesome.com --></span></button>
          </div>
        </div>
      </div>

      <div class="col-lg-4 pe-lg-2">
      <div class="card mb-3">
        <div class="card-header bg-light">
          <h5 class="mb-0">Penempatan Role</h5>
        </div>
        <div class="card-body fs--1">
          <div class="d-flex">
            
            <div class="flex-1 position-relative ps-3">
                
                @if($staff->user->roles)
                @foreach($staff->user->roles as $user_role)
                <div class="col-lg-12">
                    <label for="" class="form-label">Role Assignment</label>
                  </div>
                    <form action="{{route('staffz.role.remove', [$staff->id , $user_role->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger me-1 mb-1" type="submit">{{ $user_role->name }}</button>
                    </form>
                  @endforeach
                  @endif
                  <form action="{{route('staffz.role.add', $staff->id)}}" method="POST">
                    @csrf
                  <select class="form-select" aria-label="Default select example" name="role">
                    <option selected="">Pilih Role</option>
                    @foreach ($role as $item)
                      <option value="{{ $item -> id}}">{{ $item -> name }}</option>
                    @endforeach
                  </select>
                  <br>
                  <button class="btn btn-falcon-primary me-1 mb-1" type="submit">Assign</button>
                </form>
              <div class="border-dashed-bottom my-3"></div>
            </div>
          </div>
          {{-- <div class="d-flex">
            @if($staff->user->permissions)
            @foreach($staff->user->permissions as $user_permission)
            <div class="flex-1 position-relative ps-3">
                <div class="col-lg-12">
                    <label for="" class="form-label">Permission Assignment</label>
                  </div>
                  <button class="btn btn-outline-danger me-1 mb-1" type="button">{{ $user_permission -> name }}</button>
                  @endforeach
                  @endif
                  <select class="form-select" aria-label="Default select example">
                    <option selected="">Pilih Permission</option>
                    @foreach ($permission as $item)
                      <option value="{{ $item -> id}}">{{ $item -> name }}</option>
                    @endforeach
                    
                  </select>
              
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection