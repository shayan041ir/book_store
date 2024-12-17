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
}
