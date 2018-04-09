<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart as Cart;
use App\Mail\sendOrder;
use Mail as Mail;
use App\Mail\OrderShipped;
use Auth as Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(storage_path('app/public/product.json'));
        $items = json_decode(file_get_contents(storage_path('app/public/products.json')));

        return view('home', compact('items', 'cart'));
    }

    public function showCart()
    {
        $cart = Cart::contents();
        $total = Cart::total();

        return view('cart', compact('cart', 'total'));
    }

    public function addItemToCart(Request $request) {
        // Make the insert...
        Cart::insert(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1
        ));

        return redirect('/home');

    }

    public function cartRemove($id) {
        forEach(Cart::contents() as $item) {
            if ($item->id == $id)
             {
                 $item->remove();
                 return redirect('/cart');
                 
             }
        }

        return redirect('/cart');
    }


    public function confirmOrder() {
        Mail::to(Auth::user()->email)
            ->send(new OrderShipped(Cart::contents(), Cart::total()));
        Mail::to('shivateja219@gmail.com')
            ->send(new OrderShipped(Cart::contents(), Cart::total()));

            foreach (Cart::contents() as $item) {
                $item->remove();
            }
            
            return redirect('/cart');
    }
}
