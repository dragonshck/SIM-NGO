@extends('layouts.main')

@section('daftarlessonplan')
<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{asset('falcon/public/assets/img/icons/spot-illustrations/corner-4.png')}});">
  </div>
  <div class="card-body position-relative">
      <div class="row">
        <div class="col-lg-8">
          <h3>Romans 8:28</h3>
          <p class="mb-0">“And we know that all that happens to us is working for our good if we love God and are fitting into his plans.”</p>
        </div>
      </div>
    </div>
</div>

    <div class="card">
        <div class="card-body position-relative">
            <div class="card-header bg-light d-flex justify-content-between">
                <h5 class="mb-0">Daftar Lesson Plan</h5>
                
                <div class="d-flex justify-content-end">
                    <div class="mx-3">
                      <a class="btn btn-falcon-default btn-sm" type="button" href="{{ route('lessonplan.create') }}">
                          <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Unggah Lesson Plan
                      </a>
                    </div>
                </div>
              </div>
              <div cl
            <div class="table-responsive scrollbar">
                <table class="table table-hover table-striped overflow-hidden">
                  <thead>
                    <tr>
                      <th scope="col">Nama Tutor</th>
                      <th scope="col">Lampiran LP</th>
                      <th scope="col"></th>
                      <th scope="col">Date Uploaded</th>
                      <th scope="col">Status</th>
                      <th class="text-end" scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($lp as $syllabus)
                    <tr class="align-middle">
                      <td class="text-nowrap">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="{{ asset('images/profile/' . $syllabus -> tutorlp -> user -> profile_picture)}}" alt="" />
                          </div>
                          <div class="ms-2">{{$syllabus -> tutorlp -> user -> name}}</div>
                        </div>
                      </td>
                      <td class="text-nowrap">
                        <a class="d-inline-flex align-items-center border rounded-pill px-3 py-1 me-2 mt-2 inbox-link" href=""><svg class="svg-inline--fa fa-file-pdf fa-w-12 text-danger" data-fa-transform="grow-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-pdf" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="" style="transform-origin: 0.375em 0.5em;"><g transform="translate(192 256)"><g transform="translate(0, 0)  scale(1.25, 1.25)  rotate(0 0 0)"><path fill="currentColor" d="M181.9 256.1c-5-16-4.9-46.9-2-46.9 8.4 0 7.6 36.9 2 46.9zm-1.7 47.2c-7.7 20.2-17.3 43.3-28.4 62.7 18.3-7 39-17.2 62.9-21.9-12.7-9.6-24.9-23.4-34.5-40.8zM86.1 428.1c0 .8 13.2-5.4 34.9-40.2-6.7 6.3-29.1 24.5-34.9 40.2zM248 160h136v328c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V24C0 10.7 10.7 0 24 0h200v136c0 13.2 10.8 24 24 24zm-8 171.8c-20-12.2-33.3-29-42.7-53.8 4.5-18.5 11.6-46.6 6.2-64.2-4.7-29.4-42.4-26.5-47.8-6.8-5 18.3-.4 44.1 8.1 77-11.6 27.6-28.7 64.6-40.8 85.8-.1 0-.1.1-.2.1-27.1 13.9-73.6 44.5-54.5 68 5.6 6.9 16 10 21.5 10 17.9 0 35.7-18 61.1-61.8 25.8-8.5 54.1-19.1 79-23.2 21.7 11.8 47.1 19.5 64 19.5 29.2 0 31.2-32 19.7-43.4-13.9-13.6-54.3-9.7-73.6-7.2zM377 105L279 7c-4.5-4.5-10.6-7-17-7h-6v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-74.1 255.3c4.1-2.7-2.5-11.9-42.8-9 37.1 15.8 42.8 9 42.8 9z" transform="translate(-192 -256)"></path></g></g></svg><!-- <span class="fas fa-file-pdf text-danger" data-fa-transform="grow-4"></span> Font Awesome fontawesome.com --><span class="ms-2">lampiran_lp.pdf</span></a>
                      </td>
                      <td class="text-nowrap"></td>
                      <td class="text-nowrap">{{$syllabus -> updated_at}}</td>
                      <td>
                        @if($item-> status == 1)
                          <span class="badge badge rounded-pill d-block p-2 badge-soft-success">Accepted<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                          @else
                          <span class="badge badge rounded-pill d-block p-2 badge-soft-warning">Pending<span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span></span>
                          @endif
                      </td>
                      <td class="text-end">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                              <div class="bg-white py-2"><a class="dropdown-item" href="#!">Processing</a><a class="dropdown-item text-danger" href="#!">Approve</a></div>
                            </div>
                          </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection