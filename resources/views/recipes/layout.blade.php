<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ZhimpaZhimpa')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }

        .navbar-brand {
            font-weight: 600;
            color: #222 !important;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background-color: #000;
            border: none;
            border-radius: .5rem;
            padding: 0.5rem 1rem;
            transition: background-color .2s ease;
        }

        .btn-primary:hover {
            background-color: #333;
        }

        footer {
            text-align: center;
            font-size: 0.85rem;
            color: #888;
            padding: 1rem 0;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <nav class="navbar shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="{{ route('recipes.index') }}" class="navbar-brand">🍲 ZhimpaZhimpa</a>
            @auth
                <a href="{{ route('recipes.create') }}" class="btn btn-primary">+ Add Recipe</a>
            @else
                <div class="d-flex gap-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">Login</a>
                    <a href="{{ route('register.show') }}" class="btn btn-dark">Sign Up</a>
                </div>
            @endauth
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} ZhimpaZhimpa. All rights reserved.
    </footer>
</body>
</html>
