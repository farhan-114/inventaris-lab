<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
<<<<<<< HEAD
use Illuminate\Http\Request;
=======
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2

class PenerimaanController extends Controller
{
    public function index()
    {
<<<<<<< HEAD

=======
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
        $belanjas = Belanja::all();

        return view('penerimaan.index', compact('belanjas'));
    }
}
