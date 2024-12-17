<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Book;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        // بررسی وجود محصولات در سبد خرید
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'سبد خرید شما خالی است.');
        }

        // ایجاد سفارش جدید
        $order = new Order([
            'user_id' => Auth::id(),
            'total_amount' => array_reduce($cart, function ($sum, $item) {
                return $sum + ($item['quantity'] * $item['price']);
            }, 0),
        ]);
        $order->save();

        // افزودن آیتم‌های سفارش به دیتابیس و به‌روزرسانی موجودی محصول
        foreach ($cart as $bookId => $item) {
            // ذخیره آیتم سفارش
            OrderItem::create([
                'order_id' => $order->id,
                'book_id' => $bookId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            // به‌روزرسانی موجودی محصول
            $book = Book::find($bookId);
            if ($book) {
                $book->stock = max(0, $book->stock - $item['quantity']); // جلوگیری از موجودی منفی
                $book->save();
            }
        }

        // محاسبه مجموع مبلغ
        $total_amount = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['quantity'] * $item['price']);
        }, 0);

        // ذخیره در سشن
        session(['total_amount' => $total_amount]);

        // خالی کردن سبد خرید
        session()->forget('cart');

        // هدایت به صفحه تایید خرید
        return redirect()->route('payment', $order->id);
    }
}
