
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body text-center">
            <img src="{{ asset('storage/' . $author->image) }}" alt="Author Image" class="img-fluid mb-3" width="150">
            <h2>{{ $author->name }}</h2>
            <p>{{ $author->description }}</p>
        </div>
    </div>
</div>
