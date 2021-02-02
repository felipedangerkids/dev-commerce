<?php

namespace App\Http\Livewire;

use Image;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\ImageToProduct;
use Illuminate\Validation\Rule;
use App\Models\ProductToCategory;
use Intervention\Image\ImageManagerStatic;
use App\Helpers\Functions;

class Products extends Component
{
    use WithFileUploads;

    public  $products, $promotional_price, $category, $selected_id, $categor, $child, $product_id, $code, $name, $slug, $short_description, $colors, $family, $type_sale, $price, $brand, $width, $height, $diameter, $weight, $description, $status, $path, $image;
    public $isOpen = 0;

    public $images = [];
    public $categories;

    public function render()
    {

        $this->categories = Category::with('subcategories')->get();
        $this->products = Product::with('images', 'categories')->get();
        return view('livewire.products')->extends('layouts.app');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    public function rules()
    {
        return [
            'code' => 'required',
            'name' => 'required',
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($this->selected_id)],
         
        ];
    }
    private function resetInputFields()
    {
        $this->selected_id = null;
        $this->code = '';
        $this->name = '';
        $this->slug = '';
        $this->short_description = '';
        $this->colors = '';
        $this->family = '';
        $this->type_sale = '';
        $this->price  = '';
        $this->brand  = '';
        $this->width  = '';
        $this->height = '';
        $this->diameter = '';
        $this->weight = '';
        $this->description = '';
        $this->status = '';
        $this->category = '';
    }

    public function addImage()
    {
        $this->images[] = ['product_id' => '', 'path' => ''];
    }

    public function store()
    {

        $price = str_replace(['.', ','], ['', '.'], $this->price);
        $product = Product::create( [

                'code' => $this->code,
                'name' => $this->name,
                // 'slug' => $this->slug,
                'short_description' => $this->short_description,
                'colors' => $this->colors,
                'family' =>  $this->family,
                'type_sale' =>  $this->type_sale,
                'price' =>   $price,
                'promotional_price' =>   $this->promotional_price,
                'brand' =>   $this->brand,
                'width' =>  $this->width,
                'height' =>   $this->height,
                'diameter' =>   $this->diameter,
                'weight' =>   $this->weight,
                'description' =>   $this->description,
                'status' =>   $this->status,
            ]
        );

        if ($product) {
            foreach ($this->images as $key => $image) {


                $img = ImageManagerStatic::make($image);


                $name = Str::random() . '.jpg';

                $originalPath = storage_path('app/public/products/');

                $img->save($originalPath . $name);

                ImageToProduct::create([
                    'product_id' => $product->id,
                    'path' => $name,
                ]);
            }
        }


        if ($product) {

            foreach ($this->category as $key => $categor) {
                ProductToCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $categor,
                ]);
            }
        }

        session()->flash(
            'message',
            $this->product_id ? 'Categoria editada com sucesso.' : 'Produto criado com sucesso!.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $Product = Product::with('images', 'categories')->findOrFail($id);

        $this->selected_id = $id;
        $this->code = $Product->code;
        $this->name = $Product->name;
        $this->short_description = $Product->short_description;
        $this->colors = $Product->colors;
        $this->family = $Product->family;
        $this->type_sale = $Product->type_sale;
        $this->price = $Product->price;
        $this->promotional_price = $Product->promotional_price;
        $this->brand = $Product->brand;
        $this->width = $Product->width;
        $this->height = $Product->height;
        $this->diameter = $Product->diameter;
        $this->weight = $Product->weight;
        $this->description = $Product->description;
        $this->status = $Product->status;
        $this->category = $Product->category;
        $this->updateMode = true;
        $this->openModal();
    }

    public function update()
    {
       
     
      
        if ($this->selected_id) {
            $record = Product::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'short_description' => $this->short_description,
                'colors' => $this->colors,
                'family' =>  $this->family,
                'type_sale' =>  $this->type_sale,
                'price' =>   $this->price,
                'promotional_price' =>   $this->promotional_price,
                'brand' =>   $this->brand,
                'width' =>  $this->width,
                'height' =>   $this->height,
                'diameter' =>   $this->diameter,
                'weight' =>   $this->weight,
                'description' =>   $this->description,
                'status' =>   $this->status,
            ]);
          
            $this->updateMode = false;
        }
        session()->flash('message', 'Produto atualizado com sucesso');
    }

    public function delete($id)
    {
        $product = Product::with('images')->find($id);

        $product->delete();

        session()->flash('message', 'Produto deletado com sucesso');
    }
}
