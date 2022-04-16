<?php

namespace App\Http\Controllers;

use App\Models\Omset;
use Illuminate\Http\Request;

class OmsetController extends Controller
{
    public function index()
    {
        return view('omset.index');
    }

    public function create(Request $request)
    {
        return view("omset.create");
    }

    public function edit(Request $request)
    {
        return view("omset.edit");
    }
}
