<?php

namespace Judici\Http\Controllers;

use Illuminate\Http\Request;

use Judici\Http\Requests;

class AgendaController extends Controller
{
    public function index(){
        return view('pages/agenda');
    }

    public function createCita(){
        return view('pages/agenda/nueva-cita');
    }

    public function add(Request $request)
    {
        $fechas = explode(" - ", $request->input('fechas'));

        $cita = new Cita;
        $cita->titulo = $request->input('titulo');
        $cita->fecha_comienzo = $fechas[0];
        $cita->fecha_fin = $fechas[1];
        $cita->user_id = Auth::user()->id;
        $cita->cliente_id = $request->input('cliente');
        $cita->save();

        $request->session()->flash('success', 'Se ha agregado el evento a la agenda!');
        return redirect('events');
    }

    public function get($id)
    {
        return view('pages/agenda/cita')->with('cita', Cita::findOrFail($id));
    }

    public function edit($id)
    {
        return view('pages/agenda/editar')->with('cita', Cita::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $fechas = explode(" - ", $request->input('fechas'));

        $cita = Cita::findOrFail($id);
        $cita->titulo = $request->input('titulo');
        $cita->fecha_comienzo = $fechas[0];
        $cita->fecha_fin = $fechas[1];
        $cita->user_id = Auth::user()->id;
        $cita->cliente_id = $request->input('cliente');
        $cita->save();

        return redirect('agenda');
    }

    public function delete($id)
    {
        $event = Cita::find($id);
        $event->delete();

        return redirect('agenda');
    }

}
