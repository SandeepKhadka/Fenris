<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 360px;
            max-width: 100%;
            padding: 40px;
            box-sizing: border-box;
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-header {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 12px;
            margin-bottom: 20px;
            width: 100%;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            outline: none;
            border-color: #6c63ff;
        }
        .btn-primary {
            background-color: #6c63ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #554fdb;
        }
        .links {
            text-align: center;
            margin-top: 20px;
        }
        .links a {
            color: #6c63ff;
            text-decoration: none;
            transition: color 0.3s;
        }
        .links a:hover {
            color: #554fdb;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">Login</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            </div>
        </form>
    </div>
</body>
</html>
