<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>کتاب‌نگار</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- لینک بوت استرپ برای لوگو ها --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="{{ asset('assets/js/scripts.js') }}" defer></script>
</head>

<body>

    <!-- Header -->
    <header class="bg-primary text-white py-3 shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">کتاب‌نگار</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a href="#hero" class="nav-link text-white">خانه</a></li>
                    <li class="nav-item"><a href="#books" class="nav-link text-white">کتاب‌ها</a></li>
                    <li class="nav-item"><a href="#authors" class="nav-link text-white">نویسندگان</a></li>
                    <li class="nav-item"><a href="{{ route('cart.view') }}" class="nav-link text-white">سبد خرید</a></li>

                    <!-- اگر کاربر یا ادمین لاگین نکرده -->
                    @guest('web')
                        @guest('admin')
                            <li class="nav-item"><a href="{{ route('signup-form') }}" class="nav-link text-white">ثبت نام</a>
                            </li>
                            <li class="nav-item"><a href="{{ route('login-form') }}" class="nav-link text-white">ورود</a></li>
                        @endguest
                    @endguest

                    <!-- اگر کاربر لاگین کرده -->
                    @auth('web')
                        <li class="nav-item"><a href="{{ route('user.dashboard') }}" class="nav-link text-white">داشبورد</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link text-white">خروج</button>
                            </form>
                        </li>
                    @endauth

                    <!-- اگر ادمین لاگین کرده -->
                    @auth('admin')
                        <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link text-white">پنل
                                مدیریت</a></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link text-white">خروج</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>


    <!-- Hero Section -->
    <section id="hero" class="bg-light text-center py-5">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner">
                    @foreach ($sliders as $slider)
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/' . $slider->image_path) }}" alt="Slider Image" width="150">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">ارسال رایگان</h5>
                            <p class="card-text">ارسال رایگان به سراسر کشور</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">تنوع گسترده</h5>
                            <p class="card-text">بیش از ۱۰,۰۰۰ عنوان کتاب</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">قیمت مناسب</h5>
                            <p class="card-text">کتاب‌های با تخفیف ویژه</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">پشتیبانی ۲۴/۷</h5>
                            <p class="card-text">پاسخگویی سریع به سوالات شما</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--کتاب‌ها پرفروش-->
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- سکشن "1001 کتابی که باید بخوانید" -->
    <section class="section-1001-books ">
        <div class="container position-relative">
            <!-- عنوان و دکمه -->
            <div class="row">
                <div class="col-12">
                    <h2>1001 رمانی که باید قبل از مرگ بخوانید</h2>
                    <p>تا 20% تخفیف ویژه</p>
                    <a href="#" class="btn btn-custom">مشاهده لیست کتاب‌ها</a>
                </div>
            </div>
            <!-- نشان تخفیف -->
            <div class="discount-badge">
                تا 20% تخفیف
            </div>
        </div>
    </section>

    <!--کتاب‌ها -->
    <section id="books" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">کتاب‌ها</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0" id="search-icon">
                            <i class="bi bi-search text-secondary"></i>
                        </span>
                        <input type="text" class="form-control" id="search" placeholder="جستجوی کتاب">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <select class="form-select" id="filter">
                        <option value="all">همه دسته‌ها</option>
                        @foreach ($categories as $Category)
                            <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                        @endforeach
                    </select>
                    {{-- <button id="filter-button">اعمال فیلتر</button>  --}}
                </div>
            </div>
            <div class="row">
                @foreach ($books as $book)
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-body">
                                @if ($book->image)
                                    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->name }}"
                                        width="50">
                                @else
                                    <span>بدون تصویر</span>
                                @endif
                                <h5 class="card-title">{{ $book->name }}</h5>
                                <p>نویسنده: {{ $book->author }}</p>
                                <p>{{ number_format($book->price) }} تومان</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- نویسندگان -->
    <section id="authors" class="py-5">
        <div class="container">
            <h2 class="text-center">نویسندگان</h2>
            @foreach ($authors as $author)
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $author->image) }}" alt="author Image"
                                    width="50">
                                <h5 class="card-title">{{ $author->name }}</h5>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>

        </div>
    </section>

    <!-- مترجمان -->
    <section id="authors" class="py-5">
        <div class="container">
            <h2 class="text-center">مترجمان</h2>
            <div class="row text-center">
                @foreach ($translators as $translator)
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $translator->image) }}" alt="translator Image"
                                    width="50">
                                <h5 class="card-title">{{ $translator->name }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- ناشران -->
    <section id="authors" class="py-5">
        <div class="container">
            <h2 class="text-center">ناشران</h2>
            <div class="row text-center">
                @foreach ($publishers as $publisher)
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $publisher->image) }}" alt="publisher Image"
                                    width="50">
                                <h5 class="card-title">{{ $publisher->name }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- سکشن قبل از فوتر -->
    <section class="pre-footer">
        <div class="container">
            <p>
                با فروشگاه کتاب‌نگار، آزمون و خطایی در انتخاب و خرید کتاب در کار نخواهد بود. بهترین و تحسین‌شده‌ترین
                کتاب‌های سراسر جهان در دسترس شماست.
                هیچ دغدغه‌ای وجود ندارد. ما رسالت خود را برترین‌ها و معتربرترین کتاب‌ها قرار داده‌ایم.
            </p>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-dark text-white pt-4">
        <div class="container">
            <div class="row">
                <!-- بخش لوگو و توضیحات کوتاه -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-uppercase">فروشگاه کتاب شما</h5>
                    <p class="small">
                        هدف ما ارائه بهترین کتاب‌ها در سریع‌ترین زمان ممکن است.
                        <br>از حمایت شما سپاسگزاریم.
                    </p>
                    <img src="logo.png" alt="لوگو فروشگاه" class="img-fluid mt-2" style="width: 150px;">
                </div>


                <!-- خدمات مشتریان -->
                <div class="col-md-2 mb-3">
                    <h5 class="text-uppercase">خدمات مشتریان</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none small">درباره ما</a></li>
                        <li><a href="#" class="text-white text-decoration-none small">تماس با ما</a></li>
                        <li><a href="#" class="text-white text-decoration-none small">سؤالات متداول</a></li>
                        <li><a href="#" class="text-white text-decoration-none small">شرایط و قوانین</a></li>
                    </ul>
                </div>


                <!-- اطلاعات تماس -->
                <div class="col-md-3 mb-3">
                    <h5 class="text-uppercase">اطلاعات تماس</h5>
                    <p class="small mb-1"><i class="bi bi-geo-alt-fill"></i> تهران، خیابان انقلاب، پلاک 12</p>
                    <p class="small mb-1"><i class="bi bi-telephone-fill"></i> 021-12345678</p>
                    <p class="small"><i class="bi bi-envelope-fill"></i> info@bookstore.com</p>
                </div>


                <!-- نماد اعتماد و رسانه‌ها -->
                <div class="col-md-3">
                    <h6>نماد اعتماد الکترونیکی</h6>
                    <div class="trust-badge">
                        <img src="https://via.placeholder.com/100x100" alt="نماد اعتماد">
                    </div>
                    <h6 class="mt-3">رسانه‌های دیجیتال</h6>
                    <div class="trust-badge">
                        <img src="https://via.placeholder.com/100x100" alt="رسانه دیجیتال">
                    </div>
                </div>


            </div>
            <!-- کپی‌رایت -->
            <div class="row mt-3 border-top pt-3">
                <div class="col text-center">
                    <p class="small mb-0">&copy; 2024 فروشگاه کتاب شما. تمامی حقوق محفوظ است.</p>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
