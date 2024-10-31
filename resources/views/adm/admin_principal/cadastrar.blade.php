<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - StoreGaming</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .brand-logo {
            font-size: 2rem;
            font-weight: bold;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-card col-md-4 bg-white p-4">
            <div class="brand-logo">StoreGaming</div>
            <h3 class="text-center mb-4">Admin Login</h3>

            @if ($errors->all())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            <form action="/registrar-adm" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Name</label>
                    <input type="text" class="form-control" id="email" name="name"
                        placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" id="password" name="password_confirmation"
                        placeholder="Confirmation your password" required>
                </div>
                <div class="d-grid">
                    <input type="submit" class="btn btn-primary" value="Register">
                </div>
            </form>


        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
