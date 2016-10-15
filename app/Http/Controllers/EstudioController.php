<?php

namespace Estudio\Http\Controllers;

use Illuminate\Http\Request;

use Estudio\Http\Requests;

class EstudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.base');
    }
}
