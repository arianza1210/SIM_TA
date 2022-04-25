<?php

namespace App\Http\Controllers;

use App\Models\Omset;
use Illuminate\Http\Request;

class OmsetController extends Controller
{
    public function index()
    {
        $omsets = Omset::orderBy("id", "desc")->get();
        return view('omset.index', compact('omsets'));
    }

    public function create()
    {
        return view("omset.create");
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nopol' => 'required',
            'nama_supir' => 'required',
            'biaya_mobil' => 'required',
            'pengeluaran_jkt' => 'required',
            'pengeluaran_lpg' => 'required',
            'jumlah_omset_bersih' => 'required',
            'created_at' => 'required',
        ]);
        $validatedData['created_by'] = auth()->user()->id;

        Omset::create($validatedData);
        return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Request $request, Omset $omset)
    {
        return view("omset.edit", compact('omset'));
    }

    public function update(Request $request, Omset $omset)
    {
        $validatedData = $request->validate([
            'nopol' => 'required',
            'nama_supir' => 'required',
            'biaya_mobil' => 'required',
            'pengeluaran_jkt' => 'required',
            'pengeluaran_lpg' => 'required',
            'jumlah_omset_bersih' => 'required',
            'created_at' => 'required',
        ]);

        $validatedData['updated_by'] = auth()->user()->id;

        $omset->fill($validatedData);
        $omset->save();
        return redirect()->route('dashboard')->with('success', 'Data berhasil diperbaharui');
    }

    public function delete(Omset $omset)
    {
        $omset->delete();
        return redirect()->route('dashboard')->with('success', 'Data berhasil dihapus');
    }
}
