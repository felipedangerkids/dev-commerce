<?php

namespace App\Http\Livewire;

use Livewire\Component;
use FlyingLuscas\Correios\Client;
class Checkout extends Component
{

    public $cep;

    public function render()
    {
        return view('livewire.checkout');
    }

    public function correios()
    {

        $correios = new Client;

        $result = $correios->zipcode()->find($this->cep);

        return $result;
     
    }
}
