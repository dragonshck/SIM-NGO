@extends('layouts.main')

@section('listdatasponsor')
<div class="card">
  <div class="card-body">
    <div class="row flex-between-center">
      <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
        <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Daftar Data Sponsor</h5>
      </div>
      <div class="col-8 col-sm-auto text-end ps-2">
        <div id="table-customers-replace-element">
          <a class="btn btn-falcon-default btn-sm" type="button" href="{{ route('sponsormaster.create') }}"><svg class="svg-inline--fa fa-plus fa-w-14" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.625em;"><g transform="translate(224 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" transform="translate(-224 -256)"></path></g></g></svg><span class="d-none d-sm-inline-block ms-1">New</span></a>
          {{-- <a class="btn btn-falcon-default btn-sm mx-2" type="button" href="delete-staff/{id}"><svg class="svg-inline--fa fa-external-link-alt fa-w-16" data-fa-transform="shrink-3 down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="external-link-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;"><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M432,320H400a16,16,0,0,0-16,16V448H64V128H208a16,16,0,0,0,16-16V80a16,16,0,0,0-16-16H48A48,48,0,0,0,0,112V464a48,48,0,0,0,48,48H400a48,48,0,0,0,48-48V336A16,16,0,0,0,432,320ZM488,0h-128c-21.37,0-32.05,25.91-17,41l35.73,35.73L135,320.37a24,24,0,0,0,0,34L157.67,377a24,24,0,0,0,34,0L435.28,133.32,471,169c15,15,41,4.5,41-17V24A24,24,0,0,0,488,0Z" transform="translate(-256 -256)"></path></g></g></svg><span class="d-none d-sm-inline-block ms-1">Export</span></a> --}}
        </div>
      </div>
    </div>
    <div class="table-responsive scrollbar">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Origin Country</th>
            <th scope="col"> </th>
            <th scope="col">Date Updated</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($collection as $item)
          <tr class="hover-actions-trigger">
            <td class="align-middle text-nowrap">
              <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                  <img class="rounded-circle" src="{{ asset('images/profile/' . $item -> fotoprofil)  }}" alt="" />
                </div>
                <div class="ms-2">{{ $item -> nama_sponsor }}</div>
              </div>
            </td>
            <td class="align-middle text-nowrap">{{ $item -> origin_country }}</td>
            <td class="w-auto">
              <div class="btn-group btn-group hover-actions end-0 me-4">
                <a class="btn btn-light pe-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" href="{{ route('sponsormaster.show', $item -> id) }}"><span class="fas fa-edit"></span></a>
                <a class="btn btn-light ps-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" href="{{ route('sponsormaster.destroy', $item -> id) }}"><span class="fas fa-trash-alt"></span></a>
              </div>
            </td>
            <td class="align-middle text-nowrap">{{ $item -> updated_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection