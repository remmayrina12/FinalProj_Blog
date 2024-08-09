<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Include external CSS libraries for styling -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: rgb(207, 241, 232);

        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            width: 100%;
            max-width: 500px;
            margin: 1rem;
            box-sizing: border-box;
        }
        .card-header {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-group label {
            margin-bottom: 0.5rem;
            font-weight: 600;
            text-align: center;
        }
        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            width: 100%;
            max-width: 100%;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #4e54c8;
            outline: none;
            box-shadow: 0 0 0 1px #4e54c8;
        }
        .btn-primary {
            background-color: #4e54c8;
            border: none;
            color: #fff;
            padding: 0.75rem;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            max-width: 300px;
            margin: 1rem auto;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #3b44a8;
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            display: block;
            margin-top: 0.5rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>

                    <div class="additional-links">
                        <p>Already registered? <a href="{{ route('login') }}">Login.</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
