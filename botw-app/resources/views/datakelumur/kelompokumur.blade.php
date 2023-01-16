@extends('layouts.main')

@section('listkelompokumur')
<div class="card">
    <div class="card-body position-relative">
        <div class="card-header border-bottom">
            <div class="row flex-between-end">
              <div class="col-auto align-self-center">
                <h5 class="mb-0" data-anchor="data-anchor" id="hoverable-rows">Kelompok Umur<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#hoverable-rows" style="padding-left: 0.375em;"></a></h5>
              </div>
              <div class="col-auto ms-auto">
                <a class="btn btn-falcon-default btn-sm me-1 mb-1" type="button" href="{{ route('kelompokumur.create') }}">
                    <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Tambah Data
                  </a>
              </div>
            </div>
          </div>
        <div class="table-responsive scrollbar">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Total | Name</th>
                  <th scope="col">Tutor</th>
                  <th scope="col"></th>
                  <th scope="col">Date Created</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dataku as $item)
                @php
                  $staff = \App\Http\Controllers\KelompokUmurController::getTutor($item->id);
                @endphp
                <tr class="hover-actions-trigger">
                  <td class="align-middle text-nowrap">
                    <div class="d-flex align-items-center">
                      <div class="avatar avatar-xl">
                        <div class="avatar-name rounded-circle"><span>{{ $item -> anakku_count }}</span></div>
                      </div>
                      <div class="ms-2">{{ $item -> ku_description }}</div>
                    </div>
                  </td>
                  <td class="align-middle text-nowrap">{{$staff ? $staff->user->name : '-' }}</td>
                  <td class="w-auto">
                    <div class="btn-group btn-group hover-actions end-0 me-4">
                      <a class="btn btn-light pe-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="{{ route('kelompokumur.edit', $item -> id) }}"><span class="fas fa-edit"></span></a>
                      <a class="btn btn-light ps-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="{{ route('kelompokumur.destroy', $item -> id) }}"><span class="fas fa-trash-alt"></span></a>
                    </div>
                  </td>
                  <td class="align-middle text-nowrap">{{ \Carbon\Carbon::parse($item -> created_at)->format('j F, Y') }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
</div>

@endsection