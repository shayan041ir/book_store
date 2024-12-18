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
                <img src="{{ asset('assets/images/logo/negarbook-high-resolution-logo.png') }}" alt="لوگو فروشگاه" class="img-fluid mt-2" style="width: 150px;">
            </div>


            <!-- خدمات مشتریان -->
            <div class="col-md-2 mb-3">
                <h5 class="text-uppercase">خدمات مشتریان</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('aboutus') }}" class="text-white text-decoration-none small">درباره ما</a></li>
                    <li><a href="{{ route('contactus') }}" class="text-white text-decoration-none small">تماس با ما</a></li>
                    <li><a href="{{ route('contactus') }}" class="text-white text-decoration-none small">سؤالات متداول</a></li>
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
                    <img src="{{ asset('assets/images/site/enamad.png') }}" alt="enamad" style="height: 100px; width: 100px;">
                </div>
                <h6 class="mt-3">رسانه‌های دیجیتال</h6>
                <div class="trust-badge">
                    <img src="{{ asset('assets/images/site/resaneh.png') }}" alt="resaneh" style="height: 100px; width: 100px;">
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
