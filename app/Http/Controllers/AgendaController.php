<?php

namespace Estudio\Http\Controllers;

use Illuminate\Http\Request;

use Estudio\Http\Requests;

class AgendaController extends Controller
{
    public function index(){
        return view('pages.agenda');
    }
}
