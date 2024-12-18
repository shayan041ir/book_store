
<div class="container py-5">
    <div class="card shadow">
        <div class="card-body text-center">
            <img src="{{ asset('storage/' . $publisher->image) }}" alt="publisher Image" class="img-fluid mb-3" width="150">
            <h2>{{ $publisher->name }}</h2>
            <p>{{ $publisher->description }}</p>
        </div>
    </div>
</div>

