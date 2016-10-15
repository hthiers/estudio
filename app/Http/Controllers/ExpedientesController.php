<?php

namespace Estudio\Http\Controllers;

use Estudio\Entities\Expediente;
use Illuminate\Http\Request;

use Estudio\Http\Requests;

class ExpedientesController extends Controller
{
    public function index(){
        $expedientes = Expediente::with('clientes', 'jurisdiccion', 'rama', 'comentarios')->get();
        return view('pages.expedientes')->with(['expedientes' => $expedientes]);
    }
}
