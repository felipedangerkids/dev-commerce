<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{


    public function cartAdd(Request $request)
    {

        $product = $request->all();
      
     
        $cart = \Cart::add(array(
            'id' => $product['id'], // inique row ID
            'name' =>  $product['name'],
            'price' => $product['price'],
            'quantity' => $product['amount'],
            'attributes' => array(
                'images' => $request->images,
                'categories' => $product['categories'],
                'slug' => $product['slug'],
            )
        ));

        return Redirect::to("/cart")->with('message', 'Produto adicionado no carrinho!');
    }

    public function update(Request $request, $id)
    {
        $product = $request->all();
        \Cart::update($id, array(
            'quantity' => $product['amount'], // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        return Redirect::to("/cart")->with('message', 'Produto adicionado no carrinho!');
    }
    public function cartRemove()
    {
        \Cart::clear();

        return redirect()->back()->with('message', 'Carrinho vazio');
    }

    public function itemRemove($id)
    {
        \Cart::remove($id);

        return redirect()->back();
    }

    public function cart()
    {
        return view('site.cart');
    }
}
