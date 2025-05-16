<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>My Contact</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Khmer:wght@100..900&display=swap" rel="stylesheet">
        <!-- Style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <a class="navbar-brand text-uppercase" href="{{ route('contacts.index') }}">
                    <strong><i class="bi bi-person-lines-fill me-1"></i>Contact</strong> App
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('companies.index') ? 'active fw-bolder':'' }}" aria-current="page" href="{{ route('companies.index') }}">Company</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('contacts.index') ? 'active fw-bolder':'' }}" href="{{ route('contacts.index') }}">Contact</a>
    </li>
</ul>
                    <form class="d-flex" role="search">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item mx-1"><a href="#" class="btn btn-outline-primary"><i class="bi bi-box-arrow-in-right me-1"></i>Login</a></li>
                            <li class="nav-item mx-1"><a href="#" class="btn btn-outline-primary"><i class="bi bi-person-plus-fill me-1"></i></i>Register</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    John Doe
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="profile.html">Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
        <!-- content -->
        @yield('content')
        <script src="{{ asset('asset/bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>