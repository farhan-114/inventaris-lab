<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    public function index()
    {
        $belanjas = Belanja::all();

        return view('penerimaan.index', compact('belanjas'));
    }
}
