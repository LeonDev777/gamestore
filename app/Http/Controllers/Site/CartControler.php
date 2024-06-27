<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class CartControler extends Controller
{
    public function showCart()
    {
        $cart = array();
        $price = 0;

        if (session('cesta')) {

            foreach (session('cesta') as $key => $id) {

                $books = Book::where('id', $id)->first();
                $price += $books->price;

                array_Push($cart, [
                    $key =>
                    $books
                ]);

                unset($books);
            }
        }

        $rate = 2;
        $finalPrice = $price + $rate;
        return view('site.cart', [
            'books' => $cart,
            'price' => $price,
            'finalPrice' => $finalPrice
        ]);
    }


    public function deleteCart(Request $request)
    {
        $cesta = session()->get('cesta');
        unset($cesta[$request->valueId]);
        session()->forget('cesta');
        session()->put('cesta', $cesta);
        return redirect()->back();
    }
}
