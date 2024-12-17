<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;

class CartController extends Controller
{
    public function addToCart(Request $request, $bookId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($bookId);

        $cart = session()->get('cart', []);

        // افزودن محصول به سبد خرید
        if (isset($cart[$bookId])) {
            $cart[$bookId]['quantity'] += $request->quantity;
        } else {
            $cart[$bookId] = [
                'name' => $book->name,
                'price' => $book->price,
                'quantity' => $request->quantity,
                'image' => $book->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'محصول به سبد خرید اضافه شد!');
    }


    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('template.cart', compact('cart'));
    }

    public function removeFromCart($bookId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$bookId])) {
            unset($cart[$bookId]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'محصول از سبد خرید حذف شد!');
    }

    public function payment()
    {
        $userName = auth()->user()->name; // فرض بر این است که کاربر وارد شده است.
        $total_amount = session('total_amount', 0);
        return view('template.payment', compact('total_amount','userName'));
    }

    public function completePayment(Request $request)
    {
        session()->forget('cart'); // پاک کردن سبد خرید پس از پرداخت
        session()->forget('total_amount');

        return redirect()->route('home.page')->with('success', 'پرداخت با موفقیت انجام شد!');
    }
}
