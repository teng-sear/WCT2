@extends('layouts.main')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title m-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="m-0">{{ $company->name }}</h4>
                                <div class="m-0">
                                    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p><strong>Email:</strong> {{ $company->email }}</p>
                            <p><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
                            <p><strong>Address:</strong> {{ $company->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection