<header class="bg-primary text-white py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3">کتاب‌نگار</h1>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a href="{{ route('home.page') }}" class="nav-link text-white">خانه</a></li>
                <li class="nav-item"><a href="#books" class="nav-link text-white">کتاب‌ها</a></li>
                <li class="nav-item"><a href="{{ route('cart.view') }}" class="nav-link text-white">سبد خرید</a>
                </li>

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
