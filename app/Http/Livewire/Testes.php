<?php

namespace App\Http\Livewire;

use Image;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\ImageToProduct;
use App\Models\ProductToCategory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class Testes extends Component
{
    use WithFileUploads;

    public $categories, $category, $categor;
    

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.testes')->extends('layouts.app');
    }

    public function store()
    {

        $this->validate([

            'category' =>  '',
        ]);

       
        foreach ($this->category as $key => $categor) {
            ProductToCategory::create([
                'product_id' => 1,
                'category_id' => $categor,
            ]);
        }
    }
}
