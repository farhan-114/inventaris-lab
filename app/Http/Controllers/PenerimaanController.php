<?php

namespace App\Http\Controllers;

use App\Models\Belanja;

class PenerimaanController extends Controller
{
    public function index()
    {
        $belanjas = Belanja::all();

        return view('penerimaan.index', compact('belanjas'));
    }
}
