<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="v   iewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Blog</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}">Home </a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="{{ route('user.index') }}">User</a>
                            </li>
                        @endif
                    @endif
                </ul>
                @if (Auth::check())
                    <form class="d-flex my-2 my-lg-0" action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            Logout
                        </button>
                    </form>
                @else
                    <a class="btn btn-primary" href="{{ route('auth.index') }}">
                        Login
                    </a>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
