<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>1001 books</title>
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

    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">1001 رمانی که باید قبل از مرگ بخوانید</h2>

            <p>
                این فهرست بلندبالا و ارزشمند، مرجعی ادبی از کتاب های داستانی است که توسط بیش از صد منتقد و پژوهشگر
                ادبیات از
                سراسر جهان به وجود آمده و پیتر باکسل، استاد زبان انگلیسی در دانشگاه ساسکس در انگلستان، آن را ویرایش کرده
                است. فهرست «1001 رمانی که باید قبل از مرگ بخوانید» از بهترین رمان ها و داستان های کوتاه سراسر جهان در
                تمام
                اعصار تشکیل شده است.
            </p>

            <p>*این فهرست در سایت کتاب نگار در حال تکمیل می باشد*</p>
        </div>
    </section>

    <section id="books" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">کتاب‌ها پرفروش</h2>
            <div class="row">
            </div>
            <div class="row">
                @foreach ($bestSellingBooks as $book)
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <a href="{{ route('book.show', ['id' => $book->id]) }}">
                                    <div>
                                        @if ($book->image)
                                            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}"
                                                width="50">
                                        @else
                                            <span>بدون تصویر</span>
                                        @endif
                                        <h5>{{ $book->name }}</h5>
                                        <p>نویسنده: {{ $book->author }}</p>
                                        <p>{{ number_format($book->price) }} تومان</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    @include('template.footer')

</body>

</html>
