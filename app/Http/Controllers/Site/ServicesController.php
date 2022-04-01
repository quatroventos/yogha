<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Stats;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Redirect;



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


    /**
     * @param $serviceid
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show_details($serviceid)
    {
        $service = Services::where('id', $serviceid)->first();
        return view('site.services.service_details', compact('service'));
    }


    /**
     * @param $id
     * @return bool
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
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

    /**
     * @param $id
     * @return bool
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function add_to_cart_via_checkout($id)
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

            return Redirect::back()->withErrors(['msg' => 'Serviço adicionado do pedido.']);
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            return Redirect::back()->withErrors(['msg' => 'Serviço já se encontra em seu pedido.']);
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->price,
        ];

        session()->put('cart', $cart);

        return Redirect::back()->withErrors(['msg' => 'Serviço adicionado do pedido.']);
    }

    public function remove_from_cart($serviceid){
        $cart = \Session::get('cart');
        $servicename = $cart[$serviceid]['title'];
        unset($cart[$serviceid]);
        \Session::put('cart', $cart);
        return Redirect::back()->withErrors(['msg' => 'Serviço '.$servicename.' removido do pedido.']);
    }

}
