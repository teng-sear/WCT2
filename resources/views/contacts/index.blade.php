@extends('layouts.main')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title m-0">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center float-start">
                                    <h4 class="m-0 float-start">All Contacts</h4>
                                </div>
                                <!-- Flash Message -->
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible show text-start py-1 px-3" role="alert" >
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="m-0">
                                    <a href="{{ route('contacts.create') }}" class="btn btn-success"><i
                                            class="bi bi-plus-square"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            @include('contacts._company-filter')

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-start">ID</th>
                                        <th class="text-start">First Name</th>
                                        <th class="text-start">Last Name</th>
                                        <th class="text-start">Phone</th>
                                        <th class="text-start">Email</th>
                                        <th class="text-start">address</th>
                                        <th class="text-start">Company</th>
                                        <td class="text-start" style="width: 70px">Actions</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->id }}</td>
                                                <td>{{ $contact->first_name }}</td>
                                                <td>{{ $contact->last_name }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->address }}</td>
                                                <td>{{ $contact->company->name }}</td>
                                                <td>
                                                    <a href="{{ route('contacts.show', $contact->id) }}"
                                                       class="btn btn-sm btn-circle btn-outline-info" title="Show">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>
                                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                                       class="btn btn-sm btn-circle btn-outline-secondary" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <!-- Delete Button with Confirmation -->
                                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline"
                                                          onsubmit="return confirm('Are you sure you want to delete this company?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-circle btn-outline-danger" title="Delete">
                                                            <i class="bi bi-x-circle"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <nav class="mt-4">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection