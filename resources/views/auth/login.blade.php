<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UFix Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles-index.css">
    <style>
        .background {
            background: url('{{ asset('images/background.png') }}') no-repeat center center;
            background-size: cover;
        }

        .logo {
            max-width: 200px;
        }

        .logo-container {
            padding-left: 20%;
            text-align: left;
            margin-top: 10%;
        }

        .login-box {
            background-color: #fff;
            border-radius: 25px;
        }

        .login-box h2 {
            font-size: 24px;
            font-weight: 700;
        }

        .login-box .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center background">
        <div class="row w-100">
            <div class="col-md-7 d-none d-md-block text-center">
                <div class="logo-container">
                <img src="{{ asset('images/logo.png') }}" alt="UFix Logo" class="mb-3 logo">
                    <h2 class="text-white">Layanan Pelaporan dan Pengaduan<br>Online Telkom University</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="login-box shadow p-5">
                    <h2 class="text-center">Login</h2>
                    <p class="text-center text-muted">Single Account, Single Sign On login</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye">👁</i>
                                </button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="text-danger">Lupa Password</a>
                        </div>
                        <button type="submit" class="btn btn-danger w-100 mt-3">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    </script>
</body>
</html>
