<?php

namespace Judici\Http\Controllers;

use Judici\Entities\Expediente;
use Illuminate\Http\Request;

use Judici\Http\Requests;

class ExpedientesController extends Controller
{
    public function index(){
        $expedientes = Expediente::with('clientes', 'jurisdiccion', 'rama', 'comentarios')->get();
        return view('pages.expedientes')->with(['expedientes' => $expedientes]);
    }
}
