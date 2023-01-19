@extends('layouts.main')

@section('roleindex')
    <div class="card">
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
                @foreach ($allperm as $item)
               
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
@endsection