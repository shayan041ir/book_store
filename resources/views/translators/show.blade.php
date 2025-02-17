<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>translator</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- لینک بوت استرپ برای لوگو ها --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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


<div class="container py-5">
    <div class="card shadow">
        <div class="card-body text-center">
            <img src="{{ asset('storage/' . $translator->image) }}" alt="translator Image" class="img-fluid mb-3" width="150">
            <h2>{{ $translator->name }}</h2>
            <p>{{ $translator->description }}</p>
        </div>
    </div>
</div>

@include('template.footer')

</body>

</html>
