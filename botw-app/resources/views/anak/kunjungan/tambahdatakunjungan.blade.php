@extends('layouts.main')

@section('formhomevisit')
    <div class="card">
        <div class="card-body">
            <div class="card-header bg-light d-flex justify-content-between">
                <h5 class="mb-0">Tambah Kunjungan Anak</h5>
              </div>
              <form>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-name">Nama Anak</label>
                  <select class="form-select" aria-label="Default select example">
                    <option selected="">Pilih Nama Anak</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-form-dob">Start Date</label>
                    <input class="form-control datetimepicker" id="datetimepicker" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                  </div>
                
                <div class="mb-3">
                  <label class="form-label" for="basic-form-dob">End Date</label>
                  <input class="form-control datetimepicker" id="datetimepicker" type="text" placeholder="d/m/y H:i" data-options='{"enableTime":true,"dateFormat":"d/m/y H:i","disableMobile":true}' />
                </div>
                <div class="mb-3">
                  <label class="form-label">Upload Image</label>
                  <input class="form-control" type="file" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-form-textarea">Description</label>
                  <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
              </form>
        </div>
    </div>
@endsection