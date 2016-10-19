<?php

namespace Estudio\Http\Controllers;

use Estudio\Entities\EstadoCivil;
use Illuminate\Http\Request;

use Estudio\Entities\Cliente;

class ClientesController extends Controller
{
    const SUCCESS = 'OK';
    const ERROR = 'ERROR';
    
	
	public function index()
    {
        return view('pages.clientes')->with([
            'clientes'=> Cliente::with('estadoCivil')->get(),
            'estadosCiviles' => EstadoCivil::all()
        ]);
    }

    public function addOrUpdate(Request $request)
    {
    	$isUpdate = $request->id ? true : false;
    	$this->validate($request, [
        	'id' => 'numeric',
            'nombre' => 'required|max:45',
            'apellido' => 'required|max:45',
            'fecha_nac' => 'date_format:Y-m-d',
            'dni'=> 'numeric|max:99999999|' + $isUpdate ? '' : 'unique:clientes',
            'telefono' => 'numeric',
            'celular' => 'numeric',
            'email' => 'email|max:80',
            'domicilio' => 'max:255',
            'estado_civil' => 'numeric'
        ]);
        $cliente = $isUpdate? Cliente::find($request->id) : new Cliente;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni?: null;
        $cliente->telefono = $request->telefono?: null;
        $cliente->celular = $request->celular?: null;
        $cliente->fecha_nac = $request->fecha_nac?: null;
        $cliente->email = $request->email;
        $cliente->domicilio = $request->domicilio;
        $cliente->estado_civil_id = $request->estado_civil > 0? $request->estado_civil: null;
        $cliente->save();

        return redirect('/clientes');
    }
    
    public function get($slug)
    {
   	    $cliente = Cliente::where('slug', $slug)->first();
    	return view('pages.cliente')->withCliente($cliente);
    }

    public function getAjax($id)
    {
        return Cliente::find($id);
    }
    
    public function delete(Request $request)
    {
    	if($request->ajax()){
    		$id = $request->id;
    		return Cliente::destroy($id);
    	}
		return redirect('/');
    }


}
