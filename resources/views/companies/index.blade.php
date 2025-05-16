@extends('layouts.main')
@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title m-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="m-0">All Companies</h4>
                                <!-- Flash Message -->
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible show text-start py-1 px-3" role="alert" >
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="m-0">
                                    <a href="{{ route('companies.create') }}" class="btn btn-success"><i
                                            class="bi bi-plus-square"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
    <div class="mb-3">
        <!-- Dropdown for selecting records per page -->
        <form action="{{ route('companies.index') }}" method="GET" class="d-flex align-items-center">
            <label for="perPage" class="me-2">Records per page:</label>
            <select name="perPage" id="perPage" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
            </select>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-start">
                        <a class="text-decoration-none" href="{{ route('companies.index', ['sortBy' => 'id', 'sortDirection' => $sortBy === 'id' && $sortDirection === 'asc' ? 'desc' : 'asc', 'perPage' => $perPage]) }}">
                            ID
                            @if ($sortBy === 'id')
                                <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th class="text-start">
                        <a class="text-decoration-none" href="{{ route('companies.index', ['sortBy' => 'name', 'sortDirection' => $sortBy === 'name' && $sortDirection === 'asc' ? 'desc' : 'asc', 'perPage' => $perPage]) }}">
                            Name
                            @if ($sortBy === 'name')
                                <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <th class="text-start">
                        <a class="text-decoration-none" href="{{ route('companies.index', ['sortBy' => 'email', 'sortDirection' => $sortBy === 'email' && $sortDirection === 'asc' ? 'desc' : 'asc', 'perPage' => $perPage]) }}">
                            Email
                            @if ($sortBy === 'email')
                                <i class="bi bi-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @endif
                        </a>
                    </th>
                    <td class="text-start fw-bold">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            <a href="{{ route('companies.show', $company->id) }}"
                               class="btn btn-sm btn-circle btn-outline-info" title="Show">
                                <i class="bi bi-eye-fill"></i>
                            </a>
                            <a href="{{ route('companies.edit', $company->id) }}"
                               class="btn btn-sm btn-circle btn-outline-secondary" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Delete Button with Confirmation -->
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline"
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
    <!-- Pagination Links -->
    <nav class="mt-4">
        {{ $companies->links('pagination::bootstrap-5') }}
    </nav>
</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection