<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- لینک بوت استرپ برای لوگو ها --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="{{ asset('assets/js/scripts.js') }}" defer></script>
    <style>
        body {
            direction: rtl;
            text-align: right;
        }
    </style>
</head>

<body>
    @include('template.header')
    <div class="d-flex min-vh-100">
        <!-- Slider Section -->
        <div id="login-slider" class="carousel slide w-50" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/600x800?text=Welcome" class="d-block w-100" alt="Slide 1"
                        style="height: 100%; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Welcome to Our Website</h5>
                        <p>Explore amazing features and content.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/600x800?text=Secure+Login" class="d-block w-100"
                        alt="Slide 2" style="height: 100%; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Secure Login</h5>
                        <p>Your information is safe with us.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/600x800?text=Join+Now" class="d-block w-100" alt="Slide 3"
                        style="height: 100%; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Join Now</h5>
                        <p>Sign up and get started today!</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#login-slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#login-slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Login Form Section -->
        <div class="w-50 d-flex align-items-center justify-content-center bg-light">
            <div class="container">
                <h1 class="text-center mb-4">Login</h1>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    @error('username')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="text-center">
                        <input type="submit" value="Login" class="btn btn-primary w-100">
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a href="/" class="btn btn-link">← Back to Home</a>
                </div>
            </div>
        </div>
    </div>

    @include('template.footer')

</body>

</html>
