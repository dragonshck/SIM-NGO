@extends('main')

@section('daftarlogbook')
<div class="card">
    <div class="card-header">
      <div class="row flex-between-end">
        <div class="col-auto align-self-center">
          <h5 class="mb-0">Data Logbook Tutor</h5>
        </div>
      </div>
    </div>
    <div class="card-body py-0 border-top">
      <div class="tab-content">
        <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-4493da1e-1e0b-4482-89ff-6cbf5297dee1" id="dom-4493da1e-1e0b-4482-89ff-6cbf5297dee1">
          <div class="card shadow-none">
            <div class="card-body p-0 pb-3">
              <div class="d-flex align-items-center justify-content-end my-3">
                <div id="bulk-select-replace-element" class="">
                  <button class="btn btn-falcon-success btn-sm" type="button"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span> Font Awesome fontawesome.com --><span class="ms-1">New</span></button>
                </div>
              </div>
              <div class="table-responsive scrollbar">
                <table class="table mb-0">
                  <thead class="text-black bg-200">
                    <tr>
                      <th class="align-middle">Isi Logbook</th>
                      <th class="align-middle">Nama Mentor</th>
                      <th class="align-middle">Date Created</th>
                      <th class="align-middle white-space-nowrap pe-3">Action</th>
                    </tr>
                  </thead>
                  <tbody id="bulk-select-body">
                    <tr>
                      
                      <th class="align-middle">Kit Harington</th>
                      <td class="align-middle">British</td>
                      <td class="align-middle">Male</td>
                      <td class="align-middle white-space-nowrap text-end pe-3">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                              <div class="bg-white py-2"><a class="dropdown-item" href="#!">View Details</a><a class="dropdown-item text-success" href="#!">Approve</a></div>
                            </div>
                          </div>
                      </td>
                    </tr>
                    <tr>
                      
                      <th class="align-middle">Emilia Clarke</th>
                      <td class="align-middle">British</td>
                      <td class="align-middle">Female</td>
                      <td class="align-middle white-space-nowrap text-end pe-3">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                              <div class="bg-white py-2"><a class="dropdown-item" href="#!">View Details</a><a class="dropdown-item text-success" href="#!">Approve</a></div>
                            </div>
                          </div>
                      </td>
                    </tr>
                    <tr>
                      
                      <th class="align-middle">Peter Dinklage</th>
                      <td class="align-middle">American</td>
                      <td class="align-middle">Male</td>
                      <td class="align-middle white-space-nowrap text-end pe-3">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                              <div class="bg-white py-2"><a class="dropdown-item" href="#!">View Details</a><a class="dropdown-item text-success" href="#!">Approve</a></div>
                            </div>
                          </div>
                      </td>
                    </tr>
                    <tr>
                      
                      <th class="align-middle">Sean Bean</th>
                      <td class="align-middle">British</td>
                      <td class="align-middle">Male</td>
                      <td class="align-middle white-space-nowrap text-end pe-3">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                              <div class="bg-white py-2"><a class="dropdown-item" href="#!">View Details</a><a class="dropdown-item text-success" href="#!">Approve</a></div>
                            </div>
                          </div>
                      </td>
                    </tr>
                    <tr>
                      
                      <th class="align-middle">Maisie Williams</th>
                      <td class="align-middle">British</td>
                      <td class="align-middle">Female</td>
                      <td class="align-middle white-space-nowrap text-end pe-3">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                              <div class="bg-white py-2"><a class="dropdown-item" href="#!">View Details</a><a class="dropdown-item text-success" href="#!">Approve</a></div>
                            </div>
                          </div>
                      </td>
                    </tr>
                    <tr>
                      
                      <th class="align-middle">Sophie Turner</th>
                      <td class="align-middle">British</td>
                      <td class="align-middle">Female</td>
                      <td class="align-middle white-space-nowrap text-end pe-3">
                        <div class="dropdown font-sans-serif position-static">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0">
                              <div class="bg-white py-2"><a class="dropdown-item" href="#!">View Details</a><a class="dropdown-item text-success" href="#!">Approve</a></div>
                            </div>
                          </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection