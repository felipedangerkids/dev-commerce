<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ImageToProduct;
use App\Models\ProductToCategory;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $categories =  Category::with('subcategories')->get();
        return view('painel.products.list', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Category::with('subcategories')->get();
        return view('painel.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->all();
        $price = str_replace(['.', ','], ['', '.'], $data['price']);
        $price_promo = str_replace(['.', ','], ['', '.'], $data['promotional_price']);
        $product = Product::create([
            'code' => $data['code'],
            'name' => $data['name'],
            // 'slug' => $this->slug,
            'short_description' => $data['short_description'],
            'colors' => $data['colors'],
            'family' =>  $data['family'],
            'type_sale' =>  $data['type_sale'],
            'price' =>  $price,
            'promotional_price' =>  $request->promotional_price == null ? 0 : $price_promo,
            'brand' =>   $data['brand'],
            'width' => $data['width'],
            'height' =>   $data['height'],
            'diameter' =>   $data['diameter'],
            'weight' =>   $data['weight'],
            'description' =>  $data['description'],
            'status' =>  1,
        ]);

        if ($product) {
            foreach ($data['images'] as $key => $image) {


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

            foreach ($data['category'] as $key => $categor) {
                ProductToCategory::create([
                    'product_id' => $product->id,
                    'category_id' => $categor,
                ]);
            }
        }

        return Redirect::to("/products")->with('message', "Produto criado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('images')->find($id);
        $categories =  Category::with('subcategories')->get();
        return view('painel.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $price = str_replace(['.', ','], ['', '.'], $data['price']);
        $price_promo = str_replace(['.', ','], ['', '.'], $data['promotional_price']);
        $record = Product::find($id);

        $record->update([
            'code' => $data['code'],
            'name' => $data['name'],
            // 'slug' => $this->slug,
            'short_description' => $data['short_description'],
            'colors' => $data['colors'],
            'family' =>  $data['family'],
            'type_sale' =>  $data['type_sale'],
            'price' =>  $price,
            'promotional_price' =>  $request->promotional_price == null ? 0 : $price_promo,
            'brand' =>   $data['brand'],
            'width' => $data['width'],
            'height' =>   $data['height'],
            'diameter' =>   $data['diameter'],
            'weight' =>   $data['weight'],
            'description' =>  $data['description'],
            'status' =>  1,
        ]);

        if ($record) {
            if (!$request->images == null) {
                foreach ($request->images as $key => $image) {


                    $img = ImageManagerStatic::make($image);


                    $name = Str::random() . '.jpg';

                    $originalPath = storage_path('app/public/products/');

                    $img->save($originalPath . $name);

                    ImageToProduct::create([
                        'product_id' => $record->id,
                        'path' => $name,
                    ]);
                }
            }
        }

        if ($record) {
            if (!$request->category == null) {
                foreach ($request->category as $key => $categor) {
                    ProductToCategory::create([
                        'product_id' => $record->id,
                        'category_id' => $categor,
                    ]);
                }
            }
        }

        return Redirect::to("/products")->with('message', "Produto alterado com sucesso!");
    }


    public function destroy($id)
    {
        $product = Product::with('images')->find($id);

        $product->delete();

        return Redirect::to("/products")->with('message', "Produto deletado com sucesso!");
    }

    public function imageDelete($id)
    {
        $image = ImageToProduct::find($id);

        $image->delete();


        return Redirect::back()->with('message', "Foto deletada com sucesso!");
    }
}
