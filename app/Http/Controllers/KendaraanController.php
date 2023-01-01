<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Kendaraan::where('platno', 'LIKE', '%' . $request->search . '%')
                ->orWhere('jeniskendaraan', 'LIKE', '%' . $request->search . '%')
                ->orWhere('merk', 'LIKE', '%' . $request->search . '%')
                ->paginate(5);
        } else {
            $data = Kendaraan::paginate(5);
        }

        return view('datakendaraan', compact('data'));
    }

    public function tambahkendaraan()
    {
        return view('tambahkendaraan');
    }

    public function insertkendaraan(Request $request)
    {
        // dd($request->all());
        Kendaraan::create($request->all());
        return redirect()->route('kendaraan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function tampilkankendaraan($id)
    {
        $data = Kendaraan::find($id);
        // dd($data);
        return view('tampilkendaraan', compact('data'));
    }

    public function updatekendaraan(Request $request, $id)
    {
        $data = Kendaraan::find($id);
        $data->update($request->all());
        return redirect()->route('kendaraan')->with('success', 'Data Berhasil Di Update');
    }

    public function deletekendaraan($id)
    {
        $data = Kendaraan::find($id);
        $data->delete();
        return redirect()->route('kendaraan')->with('success', 'Data Berhasil Di Hapus');
    }
}
