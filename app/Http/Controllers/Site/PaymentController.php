<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Demand;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function paymentPost(Request $request)
    {
        $amount =  str_replace([','],[''], $request->price);
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create([
            "amount" => $amount,
            "currency" => "brl",
            "source" => $request->stripeToken,
            "description" => "teste de pagamento"
        ]);

        if (session()->exists('cesta')) {

            foreach (session('cesta') as $key => $id) {

                $books = Book::where('id', $id)->first();
                $demand  = new Demand();
                $demand->fk_users = Auth::guard('web')->id();
                $demand->fk_books = $books->id;
                $demand->image_path = $books->image_path;
                $demand->address = Auth::guard('web')->user()->state .','.
                                   Auth::guard('web')->user()->city .','.
                                   Auth::guard('web')->user()->street .'-'.
                                   Auth::guard('web')->user()->district;
                $demand->save();
                unset($books);
                unset($demand);
            }
            session()->forget('cesta');
        }else{
            return redirect()->back();
        }


        return redirect()->back()->with('msg', 'Pagamento Realizado com sucesso');
    }
}
