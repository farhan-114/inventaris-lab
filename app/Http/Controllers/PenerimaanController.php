<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Belanja;
=======
use Illuminate\Http\Request;
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f

class PenerimaanController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $belanjas = Belanja::all();

        return view('penerimaan.index', compact('belanjas'));
=======
        return view('penerimaan.index');
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    }
}