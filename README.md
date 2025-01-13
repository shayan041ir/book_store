سلام اول در
phpMyAdmin
دیتا بیس مورد نظر را ایجاد میکنیم
بعد در منوی بال
SQL
را انتخاب کرده و این دو کد را وارد میکنیم

INSERT INTO `admins` (`name`, `email`, `password`, `remember_token`)
VALUES ('admin', 'admin@gmail.com', '$2y$12$lZ65kCWu9vC7Sl9Zxz0x4uKIU8Gwy4bmqb/g3FmQBT8SCivDEiJuS', NULL);

INSERT INTO `books` (`id`, `image`, `name`, `price`, `page_count`, `stock`, `translator`, `publisher`, `author`, `publication_year`, `is_best_seller`, `is_1001_books`, `created_at`, `updated_at`) VALUES (NULL, NULL, 'test', '200', '200', '2', 'test', 'test', 'test', '1950', '1', '1', NULL, NULL);

بعد در ترمینال پروژه دستور
composer install
را بزنید

بعد ترمینال خود را باز کرده و این دستور را بزنید

php artisan migrate

و در ترمینال خود این دستور را بزنید

php artisan serve
و در مرورگر خود به آدرس
http://localhost:8000
مراجعه کنید
