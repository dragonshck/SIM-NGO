@extends('layouts.main')

@section('liststaff')
    <div class="card mb-3">
        <div class="card-header">
            <div class="card-header">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0">Daftar Staff</h5>
                    </div>
                    <div class="col-auto ms-auto">
                        <a class="btn btn-primary me-1 mb-1" type="button">Tambah Staff</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="table-responsive scrollbar">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col"> </th>
                      <th scope="col">Role</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($staff as $item)

                    <tr class="hover-actions-trigger">
                      <td class="align-middle text-nowrap">
                        <div class="d-flex align-items-center">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="{{ asset('images/profile/' . $item -> user -> fotoprofil) }}" alt="" />
                          </div>
                          <div class="ms-2">{{ $item -> user -> name }}</div>
                        </div>
                      </td>
                      <td class="align-middle text-nowrap">{{ $item -> user -> email }}</td>
                      <td class="w-auto">
                        <div class="btn-group btn-group hover-actions end-0 me-4">
                          <button class="btn btn-light pe-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></button>
                          <button class="btn btn-light ps-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="fas fa-trash-alt"></span></button>
                        </div>
                      </td>
                      <td class="align-middle text-nowrap">30/03/2018</td>
                    </tr>
                                            
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
        </div>
    </div>
@endsection