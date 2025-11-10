<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Auth - ZhimpaZhimpa')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .auth-wrapper {
            width: 100%;
            max-width: 400px;
        }

        .auth-title {
            text-align: center;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
            padding-left: 0;
            padding-right: 0;
            box-shadow: none !important;
            transition: border-color .2s;
        }

        .form-control:focus {
            border-color: #000;
        }

        .btn {
            border-radius: .5rem;
        }

        .text-muted {
            color: #6c757d !important;
        }

        a.text-muted:hover {
            color: #000 !important;
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
