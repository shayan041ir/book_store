<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            direction: rtl;
            text-align: right;
        }
    </style>
</head>

<body class="bg-light">
    @include('template.header')

    <div class="d-flex min-vh-100">
        <!-- Slider Section -->
        <div id="signup-slider" class="carousel slide w-50" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://via.placeholder.com/600x800?text=Join+Us+Today" class="d-block w-100" alt="Slide 1"
                        style="height: 100%; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Join Us Today</h5>
                        <p>Start your journey with us now.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/600x800?text=Secure+Registration" class="d-block w-100" alt="Slide 2"
                        style="height: 100%; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Secure Registration</h5>
                        <p>Your data is safe with us.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/600x800?text=Welcome+to+the+Community" class="d-block w-100" alt="Slide 3"
                        style="height: 100%; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Welcome to the Community</h5>
                        <p>Be part of something great.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#signup-slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#signup-slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Signup Form Section -->
        <div class="w-50 d-flex align-items-center justify-content-center bg-white">
            <div class="container">
                <div class="card shadow-lg p-4 border-0" style="border-radius: 10px; max-width: 400px; width: 100%;">
                    <h1 class="text-center mb-4">Sign Up</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('signup') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="/" class="btn btn-link">← Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('template.footer')
</body>

</html>
