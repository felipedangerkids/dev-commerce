<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::find($id);
        return view('painel.configs.admin.admin-update', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if (auth()->user()->email == $request->email) {
            $save = User::where('id', auth()->user()->id)->update([
                'name' => $request->name
            ]);

            return redirect()->back()->with('message', 'Nome atualizado com sucesso!!');
        } else {
            $validatedData = $request->validate([
                'email'      => 'required|unique:users',
            ]);

            $save = User::where('id', auth()->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            return redirect()->back()->with('message', 'Nome e Email atualizado com sucesso!!');
        }
    }
    public function uppass(Request $request)
    {
        if (Hash::check($request->current_password, auth()->user()->password)) {
            $validatedData = $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $uppass = User::where('id', auth()->user()->id)->update([
                'password' => Hash::make($request['password']),
            ]);

            return redirect()->back()->with('message', 'Senha Atualizada com Sucesso!!');
        } else {
            return redirect()->back()->with('error', 'Senha Atual Invalida!!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
