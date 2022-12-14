<?php

namespace App\Http\Controllers;

use App\Models\Kurir;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    public function home(Request $request)
    {

        if ($request->has('search')) {
            $data = Kurir::where('nama', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nik', 'LIKE', '%' . $request->search . '%')
                ->paginate(5);
        } else {
            $data = Kurir::paginate(5);
        }


        return view('datakurir', compact('data'));
    }

    public function index(Request $request)
    {

        if ($request->has('search')) {
            $data = Kurir::where('nama', 'LIKE', '%' . $request->search . '%')
                ->orWhere('nik', 'LIKE', '%' . $request->search . '%')
                ->paginate(5);
        } else {
            $data = Kurir::paginate(5);
        }


        return view('datakurir', compact('data'));
    }

    public function tambahkurir()
    {
        return view('tambahkurir');
    }

    public function insertkurir(Request $request)
    {
        $data = Kurir::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotokurir/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('kurir')->with('success', ' Data Berhasil Di Tambahkan');
    }

    public function tampilkankurir($id)
    {
        $data = Kurir::find($id);
        // dd($data);

        return view('tampilkurir', compact('data'));
    }

    public function detailkankurir($id)
    {
        $data = Kurir::find($id);
        // dd($data);

        return view('detailkurir', compact('data'));
    }

    public function updatekurir(Request $request, $id)
    {
        $data = Kurir::find($id);
        $data->update($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotokurir/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('kurir')->with('success', ' Data Berhasil Di Update');
    }

    public function deletekurir($id)
    {
        $data = Kurir::find($id);
        $data->delete();
        return redirect()->route('kurir')->with('success', ' Data Berhasil Di Hapus');
    }
}
