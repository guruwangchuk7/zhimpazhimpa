<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'ZhimpaZhimpa')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #f9fafb;
        }

        body {
            display: flex;
            flex-direction: column;
            padding-top: 4.5rem;
        }

        main.container {
            flex: 1;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .navbar {
            background-color: #111 !important;
        }

        .navbar-brand {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85) !important;
            transition: color .2s ease;
        }

        .nav-link:hover {
            color: #fff !important;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            text-align: center;
            padding: 0.8rem 0;
            color: #777;
            font-size: 0.9rem;
            border-top: 1px solid #eaeaea;
            z-index: 1030;
        }

        .btn-link.dropdown-item {
            color: #212529;
            text-decoration: none;
        }

        .btn-link.dropdown-item:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('recipes.index') }}">🍲 ZhimpaZhimpa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('recipes.index') }}">Home</a></li>

                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('recipes.create') }}">Add Recipe</a></li>
                    @endauth

                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login.show') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register.show') }}">Register</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="px-3">
                                        @csrf
                                        <button class="btn btn-link dropdown-item w-100 text-start">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} ZhimpaZhimpa — All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
