
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body text-center">
            <img src="{{ asset('storage/' . $translator->image) }}" alt="translator Image" class="img-fluid mb-3" width="150">
            <h2>{{ $translator->name }}</h2>
            <p>{{ $translator->description }}</p>
        </div>
    </div>
</div>
