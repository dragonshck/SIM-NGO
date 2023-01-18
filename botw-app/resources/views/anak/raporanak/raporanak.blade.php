@extends('layouts.main')

@section('listrapor')
<div class="d-flex mb-4 mt-3"><span class="fa-stack me-2 ms-n1"><svg class="svg-inline--fa fa-circle fa-w-16 fa-stack-2x text-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-stack-2x text-300"></i> Font Awesome fontawesome.com --><svg class="svg-inline--fa fa-spinner fa-w-16 fa-inverse fa-stack-1x text-primary" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="spinner" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z"></path></svg><!-- <i class="fa-inverse fa-stack-1x text-primary fas fa-spinner"></i> Font Awesome fontawesome.com --></span>
  <div class="col">
    <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Data Rapor Anak</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
    <p class="mb-0">Rapor Anak</p>
  </div>
</div>
<div class="row g-3">
  <div class="col-lg-8">

    <div class="card mb-3">
      @can('read access anak')
      <div class="card-header bg-light overflow-hidden">
        <div class="d-flex align-items-center">
          <div class="flex-1 ms-2">
            <h5 class="mb-0 fs-0">Masukkan data rapor..</h5>
          </div>
        </div>
      </div>
      
      <div class="card-body p-0">
        <form method="POST" action="{{ route('rapor.store')}}" enctype="multipart/form-data">
          @csrf
          <textarea name="keterangan_rapor" class="shadow-none form-control rounded-0 resize-none px-card border-y-0 border-200" placeholder="Keterangan Rapor.." rows="4"></textarea>
          <div class="d-flex align-items-center ps-card border border-200">
            <label class="text-nowrap mb-0 me-2" for="hash-tags"><svg class="svg-inline--fa fa-plus fa-w-14 me-1 fs--2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg><!-- <span class="fas fa-plus me-1 fs--2"></span> Font Awesome fontawesome.com --><span class="fw-medium fs--1">Keterangan</span></label>
            <input name="avg_nilai" class="form-control border-0 fs--1 shadow-none" id="hash-tags" type="text" placeholder="Masukkan rata-rata nilai...">
          </div>
          <div class="row g-0 justify-content-between mt-3 px-card pb-3">
            <div class="col">
              <div class="d-flex align-items-center">
                <input name="lampiran_rapor" class="d-none" id="email-attachment" type="file">
                <label class="me-2 btn btn-light btn-sm mb-0 cursor-pointer" for="email-attachment" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Attach files" aria-label="Attach files"><svg class="svg-inline--fa fa-paperclip fa-w-14 fs-1" data-fa-transform="down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="paperclip" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(1, 1)  rotate(0 0 0)"><path fill="currentColor" d="M43.246 466.142c-58.43-60.289-57.341-157.511 1.386-217.581L254.392 34c44.316-45.332 116.351-45.336 160.671 0 43.89 44.894 43.943 117.329 0 162.276L232.214 383.128c-29.855 30.537-78.633 30.111-107.982-.998-28.275-29.97-27.368-77.473 1.452-106.953l143.743-146.835c6.182-6.314 16.312-6.422 22.626-.241l22.861 22.379c6.315 6.182 6.422 16.312.241 22.626L171.427 319.927c-4.932 5.045-5.236 13.428-.648 18.292 4.372 4.634 11.245 4.711 15.688.165l182.849-186.851c19.613-20.062 19.613-52.725-.011-72.798-19.189-19.627-49.957-19.637-69.154 0L90.39 293.295c-34.763 35.56-35.299 93.12-1.191 128.313 34.01 35.093 88.985 35.137 123.058.286l172.06-175.999c6.177-6.319 16.307-6.433 22.626-.256l22.877 22.364c6.319 6.177 6.434 16.307.256 22.626l-172.06 175.998c-59.576 60.938-155.943 60.216-214.77-.485z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-paperclip fs-1" data-fa-transform="down-2"></span> Font Awesome fontawesome.com --></label>
              </div>
            </div>
            <div class="col-auto">
              <button class="btn btn-primary btn-sm px-4 px-sm-5" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
      @endcan
    </div>
  @foreach ($datarapor as $item)
      
      <div class="card mb-3">
        <div class="card-header bg-light">
          <div class="row justify-content-between">
            <div class="col">
              <div class="d-flex">
                <div class="avatar avatar-2xl">
                  <img class="rounded-circle" src="{{ asset('images/profile/' . $item -> anak2rapor -> user -> profile_picture )}}" alt="">

                </div>
                <div class="flex-1 align-self-center ms-2">
                  <p class="mb-1 lh-1">{{ $item -> anak2rapor -> user -> name }}</p>
                  <p class="mb-0 fs--1">Uploaded | {{ $item -> created_at->toDayDateTimeString(); }} <!-- <span class="fas fa-users"></span> Font Awesome fontawesome.com --></p>
                </div>
              </div>
            </div>
            <div class="col-auto">
              @can('read access anak')
              <div class="dropdown font-sans-serif">
                <button class="btn btn-sm dropdown-toggle p-1 dropdown-caret-none" type="button" id="post-article-action" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg class="svg-inline--fa fa-ellipsis-h fa-w-16 fs--1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="ellipsis-h" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M328 256c0 39.8-32.2 72-72 72s-72-32.2-72-72 32.2-72 72-72 72 32.2 72 72zm104-72c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72zm-352 0c-39.8 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.2-72-72-72z"></path></svg><!-- <span class="fas fa-ellipsis-h fs--1"></span> Font Awesome fontawesome.com --></button>
                <div class="dropdown-menu dropdown-menu-end py-3" aria-labelledby="post-article-action" style=""><a class="dropdown-item" href="{{ route('rapor.edit', $item -> id)}}" data-bs-toggle="modal" data-bs-target="#error-modal">Edit</a>
                </div>
              </div>
              @endcan
            </div>
          </div>
        </div>
        <img class="card-img-top" src="{{ asset('falcon/public/assets/img/generic/placeholder.jpg') }}" alt="" width="350px">
          <div class="card-body overflow-hidden">
            <div class="row justify-content-between align-items-center">
              <div class="col">
                <div class="d-flex">
                  <div class="calendar me-2"><span class="calendar-month">AVG</span><span class="calendar-day">{{ $item -> avg_nilai }}</span></div>
                  <div class="flex-1 fs--1">
                    <h5 class="fs-0">{{ $item -> keterangan_rapor }}</h5>
                  </div>
                </div>
              </div>
              <div class="col-md-auto d-none d-md-block">
                <a class="d-inline-flex align-items-center border rounded-pill px-3 py-1 me-2 mt-2 inbox-link" href="{{ asset('raporanak/' . $item -> lampiran_rapor) }}"><svg class="svg-inline--fa fa-file-pdf fa-w-12 text-danger" data-fa-transform="grow-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-pdf" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="" style="transform-origin: 0.375em 0.5em;"><g transform="translate(192 256)"><g transform="translate(0, 0)  scale(1.25, 1.25)  rotate(0 0 0)"><path fill="currentColor" d="M181.9 256.1c-5-16-4.9-46.9-2-46.9 8.4 0 7.6 36.9 2 46.9zm-1.7 47.2c-7.7 20.2-17.3 43.3-28.4 62.7 18.3-7 39-17.2 62.9-21.9-12.7-9.6-24.9-23.4-34.5-40.8zM86.1 428.1c0 .8 13.2-5.4 34.9-40.2-6.7 6.3-29.1 24.5-34.9 40.2zM248 160h136v328c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V24C0 10.7 10.7 0 24 0h200v136c0 13.2 10.8 24 24 24zm-8 171.8c-20-12.2-33.3-29-42.7-53.8 4.5-18.5 11.6-46.6 6.2-64.2-4.7-29.4-42.4-26.5-47.8-6.8-5 18.3-.4 44.1 8.1 77-11.6 27.6-28.7 64.6-40.8 85.8-.1 0-.1.1-.2.1-27.1 13.9-73.6 44.5-54.5 68 5.6 6.9 16 10 21.5 10 17.9 0 35.7-18 61.1-61.8 25.8-8.5 54.1-19.1 79-23.2 21.7 11.8 47.1 19.5 64 19.5 29.2 0 31.2-32 19.7-43.4-13.9-13.6-54.3-9.7-73.6-7.2zM377 105L279 7c-4.5-4.5-10.6-7-17-7h-6v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-74.1 255.3c4.1-2.7-2.5-11.9-42.8-9 37.1 15.8 42.8 9 42.8 9z" transform="translate(-192 -256)"></path></g></g></svg><!-- <span class="fas fa-file-pdf text-danger" data-fa-transform="grow-4"></span> Font Awesome fontawesome.com --><span class="ms-2">{{ $item -> lampiran_rapor }}</span></a>
              </div>
            </div>
          </div>
      </div>
      <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
          <div class="modal-content position-relative">
            <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
              <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
              <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                <h4 class="mb-1" id="modalExampleDemoLabel">Edit Data Rapor</h4>
              </div>
              <div class="p-4 pb-0">
                <form method="POST" action="{{ route('rapor.update', $item -> id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                    <label class="col-form-label" for="recipient-name">Keterangan Rapor:</label>
                    <input class="form-control" id="recipient-name" type="text" name="keterangan_rapor" value="{{ $item -> keterangan_rapor }}"/>
                  </div>
                  <div class="mb-3">
                    <label class="col-form-label" for="message-text">Rata-rata Nilai:</label>
                    <input class="form-control" id="message-text" name="avg_nilai" value="{{ $item -> avg_nilai }}"></input>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="customFile">Lampiran</label>
                    <input class="form-control" id="customFile" type="file" name="lampiran_rapor"/>
                  </div>
                
              </div>
            </div>
              <div class="modal-footer">
                
                <button class="btn btn-primary" type="submit">Update</button>
                
              </div>
          </form>
          </div>
        </div>
      </div>

  @endforeach

  </div>

  <div class="col lg-4">
    
  </div>

  

</div>

@endsection