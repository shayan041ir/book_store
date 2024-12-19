<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>contactus</title>
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

        form .form-group {
            margin-bottom: 15px;
        }

        form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @include('template.header')
    <div class="pull-right">

        <section>
            <div class="container mt-5">
                <h2>
                    تماس با کتاب نگار
                </h2>
            </div>
        </section>
        <section>
            <div class="container mt-5">
                <p>

                    کاربر گرامی، لطفاً در صورت وجود هرگونه سوال یا ابهامی، پیش از ارسال ایمیل یا تماس تلفنی با کتاب نگار
                    ،
                    بخش پرسش‏های متداول را ملاحظه فرمایید و در صورتی که پاسخ خود را نیافتید، با ما تماس بگیرید.
                    <br>
                    رسیدگی به انتقادها
                    مشتری گرامی، اگر انتقاد یا شکایتی از کتاب نگار دارید برای دریافت پاسخ سریع‌تر، لطفا به آدرس
                    complaint@negarbook.ir ایمیل ارسال کنید .
                    <br>


                    در تعطیلات رسمی ، کتاب نگار هیچ‌گونه پاسخگویی، سرویس‌دهی و خدماتی ندارد،

                    <br>
                    تلفن تماس و فکس: 62999935 - 021 (پاسخگویی در روز های کاری شنبه تا چهارشنبه از ساعت ۹ تا ۱۸ - پنجشنبه
                    از
                    ساعت ۹ تا ۱۶ می‌باشد)

                    <br>
                    توجه داشته باشید که 10008727 - 10001631 - 20003908 شماره‌ های است که کتاب نگار از طریق آن برای
                    کاربران
                    و مشتریان خود پیامک (اس ام اس) ارسال می‌کند. بنابراین ارسال هرگونه پیامک تحت عنوان کتاب نگار ، با هر
                    شماره دیگری تخلف و سوء استفاده از نام کتاب نگار است و در صورت دریافت چنین پیامکی، لطفاً جهت پیگیری
                    قانونی آن را به info@negarbook.ir اطلاع دهید.
                    <br>
                    همچنین شماره های اعلام شده سامانه ارسال پیامک است که وضعیت پردازش سفارش یا رویدادها، خدمات و
                    سرویس‌های
                    ویژه کتاب نگار را به اطلاع کاربران می‌رساند و روشن است که امکان دریافت پیام‌های شما از طریق این
                    شماره
                    وجود ندارد. "

                    <br>

                    شرکت هفت کتاب رایبد (فروشگاه آنلاین ایران‌کتاب)
                    <br>
                    دفتر مرکزی:
                    استان تهران - شهر تهران، میدان انقلاب، کوچه حسینعلی پور، کوچه برهانی، پلاک ۱۹
                    <br>
                    مرکز امور مشتریان:
                    <br>
                    لطفاً برای بازگرداندن کالا و ارسال آن به کتاب نگار از طریق پست، تنها از آدرس زیر استفاده کنید:
                    تهران - صندوق پستی : 133-16315
                    <br>
                    ایمیل سازمانی کتاب نگار info@negarbook.ir
                    <br>

                    آی دی کانال تلگرام سایت کتاب نگار : @negarbook_ir
                    <br>
                    مشتری گرامی برای پیگیری یا سوال درباره سفارش بهتر است از فرم زیر استفاده کنید. اما اگر تمایل به
                    ارسال
                    مستقیم ایمیل دارید، جهت تسریع در پاسخ‌گویی لطفاً شماره سفارش (پیگیری) را در ایمیل خود ذکر کنید.
                    <br>

                    لطفاً در صورت امکان اطلاعات را به فارسی وارد نمایید.
                </p>
            </div>
            <div class="container mt-4">
                <form role="form">
                    <div class="form-group">
                        <label for="name">نام و نام خانوادگی:</label>
                        <input type="text" class="form-control" id="name" placeholder="نام و نام خانوادگی"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="email">ایمیل:</label>
                        <input type="email" class="form-control" id="email" placeholder="ایمیل" required>
                    </div>
                    <div class="form-group">
                        <label for="message">متن پیام:</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="متن پیام" required></textarea>
                    </div>
                    <button type="submit">ارسال پیام</button>
                </form>
            </div>
        </section>
    </div>
    @include('template.footer')
</body>

</html>
