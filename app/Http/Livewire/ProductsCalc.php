<?php

namespace App\Http\Livewire;

use Manny;
use App\Models\Product;
use Livewire\Component;
use Darryldecode\Cart\Cart;

class ProductsCalc extends Component
{
    public $product, $value,  $width, $depth, $productLike;
    public $items = [];
    public $calculo;
 
    public function render()
    {
        
        return view('livewire.products-calc')->extends('layouts.site');
    }

    public function calc()
    { 
            $this->validate([
                'width' => 'required',
                'depth' => 'required',
            ]);


    $this->calculo = $this->product->price * $this->width * $this->depth;
         


    }

    public function cart()
    {

        $calculo = $this->calculo / 2;

        $cart = \Cart::add(array(
            'id' => $this->product->id, // inique row ID
            'name' =>  $this->product->name,
            'price' => $calculo > 0 ? $calculo : $this->product->price,
            'quantity' => 1,
            'attributes' => array(
                'images' => $this->product->images,
                'categories' => $this->product->categories,
                'slug' => $this->product->slug,
                'width' => $this->product->width,
                'height' => $this->product->height,
                'diameter' => $this->product->diameter,
                'weight' => $this->product->weight,
                'colors' => $this->product->colors,
                
            )
        ));

        session()->flash('message', 'Produto adicionado no carrinho!');
     
    }




}
