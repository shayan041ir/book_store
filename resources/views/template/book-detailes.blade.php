<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>book-detailes</title>
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
</head>

<body>
    @include('template.header')


    <div class="container mt-4">
        <button class="btn btn-outline-secondary mb-4" onclick="location.href='{{ route('home.page') }}';">بازگشت به
            صفحه
            اصلی</button>

        <div class="row">
            <div class="col-md-6">
                <div class="image-container">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}"
                        class="img-fluid book-image" style="max-width: 100%; height: auto; max-height: 400px; object-fit: contain;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="book-details">
                    <h2 class="mb-3 text-primary">{{ $book->name }}</h2>
                    <p class="text-muted">{{ $book->description }}</p>
                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <strong>نویسنده:</strong> {{ $book->author }}
                        </li>
                        <li class="list-group-item">
                            <strong>مترجم:</strong> {{ $book->translator ?? 'ندارد' }}
                        </li>
                        <li class="list-group-item">
                            <strong>ناشر:</strong> {{ $book->publisher }}
                        </li>
                        <li class="list-group-item">
                            <strong>سال انتشار:</strong> {{ $book->publication_year }}
                        </li>
                        <li class="list-group-item">
                            <strong>تعداد صفحات:</strong> {{ $book->page_count }} صفحه
                        </li>
                    </ul>
                </div>
                
                <h3 class="text-primary">قیمت: {{ number_format($book->price) }} تومان</h3>
                <p>موجودی: <strong>{{ $book->stock }}</strong> عدد</p>

                @if (Auth::check())
                    <!-- فرم افزودن به سبد خرید -->
                    <form action="{{ route('cart.add', $book->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="quantity" class="form-label">تعداد:</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-secondary" onclick="decreaseQuantity()">-</button>
                                <input type="number" id="quantity" name="quantity" value="1" min="1"
                                    max="{{ $book->stock }}" class="form-control text-center">
                                <button type="button" class="btn btn-secondary" onclick="increaseQuantity()">+</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">افزودن به سبد خرید</button>
                    </form>
                @else
                    <!-- پیام برای کاربران غیر وارد شده -->
                    <p class="text-danger">برای خرید این محصول ابتدا وارد حساب کاربری خود شوید یا ثبت نام کنید.</p>
                    <a href="{{ route('login') }}" class="btn btn-success">ورود</a>
                    <a href="{{ route('signup-form') }}" class="btn btn-info">ثبت نام</a>
                @endif
            </div>
        </div>

        <hr class="my-4">

        <!-- بخش نظرات -->
        <h3>نظرات</h3>
        <div class="mb-4">
            @if (Auth::check())
                <!-- فرم ثبت نظر -->
                <form action="{{ route('comments.store', $book->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="comment" class="form-label">ثبت نظر:</label>
                        <textarea name="comment" id="comment" rows="4" class="form-control" placeholder="نظر خود را وارد کنید"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">ارسال نظر</button>
                </form>
            @else
                <!-- پیام برای کاربران غیر وارد شده -->
                <p class="text-danger">برای ثبت نظر ابتدا وارد حساب کاربری خود شوید یا ثبت نام کنید.</p>
                <a href="{{ route('login') }}" class="btn btn-success">ورود</a>
                <a href="{{ route('signup-form') }}" class="btn btn-info">ثبت نام</a>
            @endif
        </div>
        <div>
            @forelse ($book->comments->where('is_approved', true) as $comment)
                <div class="border p-3 mb-2 rounded shadow-sm">
                    <strong>{{ $comment->user->name ?? 'مهمان' }}</strong> گفت:
                    <p>{{ $comment->content }}</p>
                    <small class="text-muted">در {{ $comment->created_at->format('Y-m-d H:i') }}</small>
                </div>
            @empty
                <p>نظری برای این محصول ثبت نشده است.</p>
            @endforelse
        </div>
    </div>

    <script>
        function decreaseQuantity() {
            let quantityInput = document.getElementById('quantity');
            if (quantityInput.value > 1) {
                quantityInput.value--;
            }
        }

        function increaseQuantity() {
            let quantityInput = document.getElementById('quantity');
            if (parseInt(quantityInput.value) < {{ $book->stock }}) {
                quantityInput.value++;
            }
        }
    </script>


    @include('template.footer')

</body>

</html>
