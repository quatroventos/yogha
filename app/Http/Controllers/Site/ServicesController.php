<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Stats;
use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $services = Services::all();

        return view('site.services.index', compact('services'));
    }

    public function show_details($serviceid)
    {
        $service = Services::where('id', $serviceid)->first();

        return view('site.services.service_details', compact('service'));
    }

    public function add_to_cart($id)
    {
        $product = Services::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "title" => $product->title,
                    "quantity" => 1,
                    "price" => $product->price,
                ]
            ];

            session()->put('cart', $cart);

            return true;
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            session()->put('cart', $cart);

            return true;

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->price,
        ];

        session()->put('cart', $cart);

        return true;
    }

    public function remove_from_cart(){
        \Session::forget('services');
        return true;
    }



}
