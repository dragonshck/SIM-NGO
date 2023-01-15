@extends('main')

@section('daftarlessonplan')
    <div class="card">
        <div class="card-body position-relative">
            <div class="card-header bg-light d-flex justify-content-between">
                <h5 class="mb-0">Daftar Lesson Plan</h5>
                
                <div class="d-flex justify-content-end">
                  <form>
                      <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected="selected">Select Category</option>
                        <option>TK</option>
                        <option>SD</option>
                        <option>SMP</option>
                        <option>SMA / K - Kuliah</option>
                      </select>
                    </form>
                    <div class="mx-3">
                      <a class="btn btn-falcon-default btn-sm" type="button" href="/add-lesson-plan">
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
                      <th scope="col">KU</th>
                      <th scope="col">Date Uploaded</th>
                      <th scope="col">Status</th>
                      <th class="text-end" scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="align-middle">
                      <td class="text-nowrap">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="../../assets/img/team/4.jpg" alt="" />
                          </div>
                          <div class="ms-2">Ricky Antony</div>
                        </div>
                      </td>
                      <td class="text-nowrap">ricky@example.com</td>
                      <td class="text-nowrap">(201) 200-1851</td>
                      <td class="text-nowrap">2392 Main Avenue, Penasauka</td>
                      <td><span class="badge badge rounded-pill d-block p-2 badge-soft-success">Completed<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
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
                    <tr class="align-middle">
                      <td class="text-nowrap">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="../../assets/img/team/13.jpg" alt="" />
                          </div>
                          <div class="ms-2">Emma Watson</div>
                        </div>
                      </td>
                      <td class="text-nowrap">emma@example.com</td>
                      <td class="text-nowrap">(212) 228-8403</td>
                      <td class="text-nowrap">2289 5th Avenue, New York</td>
                      <td><span class="badge badge rounded-pill d-block p-2 badge-soft-success">Completed<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
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
      
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection