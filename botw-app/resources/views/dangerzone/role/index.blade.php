@extends('layouts.main')
@section('permissionidx')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row flex-between-end">
              <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor" id="example">Example<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#example" style="padding-left: 0.375em;"></a></h5>
              </div>
              <div class="col-auto ms-auto">
                <a class="btn btn-outline-primary me-1 mb-1" type="button" href="{{ route('role.create')}} ">Create Role
                </a>
              </div>
            </div>
          </div>
          <div class="card-body bg-light">
            <div class="table-responsive scrollbar">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Guard</th>
                      <th class="text-end" scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allroles as $item)
                        
                    <tr>
                      <td>{{ $item -> name }}</td>
                      <td>{{ $item -> guard_name }}</td>
                      <td class="text-end">
                        <div>
                          <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span></button>
                          <button class="btn p-0 ms-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button>
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