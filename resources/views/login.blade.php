<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - CRM Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #e0e7ff 0%, #f1f5f9 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
        }
        .card {
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        .card-header {
            background: linear-gradient(135deg, #a3d5a5 0%, #6cbd70 100%);
            color: white;
            border: none;
            padding: 2rem 1.5rem;
            text-align: center;
        }
        .card-header h4,
        .card-header p {
            color: #ffffff !important;
        }
        .card-header h4 {
            margin: 0;
            font-weight: 700;
            font-size: 1.5rem;
        }
        .card-body {
            padding: 2rem;
        }
        .form-control {
            margin-bottom: 1rem;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
        }
        .form-control:focus {
            border-color: #6cbd70;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        .btn-login {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            border: none;
            font-weight: 600;
            margin-top: 0.5rem;
            color: #ffffff;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(30, 64, 175, 0.35);
            color: #ffffff;
        }
        .text-danger {
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <h4>📊 CRM Dashboard</h4>
                <p style="margin: 0.5rem 0 0 0; opacity: 0.9;">Admin Login</p>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Invalid email or password. Please try again.
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="admin@example.com" required autofocus>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login">Login</button>
                </form>
                <hr>
                <p style="text-align: center; color: #6b7280; font-size: 0.875rem; margin: 0;">
                    Demo: admin@example.com / password
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>