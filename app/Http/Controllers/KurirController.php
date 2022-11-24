<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    public function index(){

        $data = Kurir::all();
         return view('datakurir', compact('data'));
    }

    public function tambahkurir(){
        return view('tambahkurir');
    }

    public function insertkurir(Request $request){
        Kurir::create($request->all());
        return redirect()->route('kurir')->with('success', ' Data Berhasil Di Tambahkan');
    }

    public function tampilkankurir($id){
        $data = Kurir::find($id);
        // dd($data);

        return view('tampilkurir', compact('data'));
    }

    public function updatekurir(Request $request, $id){
        $data = Kurir::find($id);
        $data->update($request->all());

        return redirect()->route('kurir')->with('success', ' Data Berhasil Di Update');
    }
}
