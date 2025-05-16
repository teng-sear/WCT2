@extends('layouts.main')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title m-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="m-0">Edit Company</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('companies.update', $company->id) }}" method="POST" class="needs-validation">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
                                    <div class="invalid-feedback">Please enter a name.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}" required>
                                    <div class="invalid-feedback">Please enter a valid email.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="url" name="website" id="website" class="form-control" value="{{ $company->website }}" required>
                                    <div class="invalid-feedback">Please enter a valid website URL.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ $company->address }}" required>
                                    <div class="invalid-feedback">Please enter an address.</div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
