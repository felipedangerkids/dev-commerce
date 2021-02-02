<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductToCategory;
use App\Models\UserOrder;
use Illuminate\Support\Facades\DB;

class PainelController extends Controller
{
    public function index()
    {
        $users = User::all();
        $orders = UserOrder::all();
        return view('painel.dashboard', compact('users', 'orders'));
    }



    public function users()
    {
        $users = User::all();
        return view('painel.users', compact('users'));
    }


    public function conta()
    {
        $users = User::all();
        return view('painel.configs.admin.list', compact('users'));
    }
 
}
