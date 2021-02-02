<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Helpers\HelperClass;
use App\Models\Product;
use App\Models\ProductToCategory;
use App\Models\User;
use App\Models\UserOrder;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->with('categories', 'images')->limit(25)->get();
        $categories = Category::whereNull('parent_id')->with('childrenCategories')->get();
        return view('site.index', compact('categories', 'products'));
    }

    public function allProducts()
    {

          $products = Product::with('categories', 'images')->paginate(24);
          return view('site.products.productsall', compact('products'));

    }

    public function categoria($slug)
    {
        $categorie_show = HelperClass::categorie(['slug' => $slug]);
        $categories = Category::whereNull('parent_id')->with('childrenCategories')->get();
        $products = Product::whereHas('categories', function ($query) use ($categorie_show) {
            $query->where('category_id', $categorie_show->id);
        })->get();

        return view('site.products.categorias', compact('categorie_show', 'products', 'categories'));
    }



    public function productDetail($slug)
    {

        $product = Product::with('images', 'categories')->where('slug', $slug)->get()->first();
        $productLike = Product::where('slug', '!=', $slug)->inRandomOrder()->take(4)->get();
        return view('site.products.productdetail', compact('product', 'productLike'));
    }

    public function minhaConta()
    {
        $orders = User::with('orders')->get();
        return view('site.conta.home', compact('orders'));
    }

    public function showOrder($id)
    {
        $user = auth()->user()->id;
        $ordem = UserOrder::where('user_id', $user)->find($id);
    

        return view('site.conta.pedidos', compact('ordem'));

    }

    public function search(Request $request)
    {
        $pesquisa = $request->pesquisa;

        $products = Product::with(['categories'])->where('name', 'like', '%' . $pesquisa . '%')->get();

        return view('site.pesquisa', compact('pesquisa', 'products'));
    }
    public function accountUser()
    {
       return view('site.account');
    }
}
