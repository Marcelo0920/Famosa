<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class ClienteController extends Controller
{
    public function index(){
        $datos['clientes'] = User::paginate(10);
        return view('cliente.index', $datos);
    }

    public function create(){
        return view('cliente.create');
    }

    public function store(RegisterRequest $request){
        $datosClien = User::create($request->validated());
        $datosClien = request()->except(['_token','password','password_confirmation','TipoA','TipoE','TipoC','domicilio','estado']);
        return redirect('cliente')->with('mensaje','Empleado Agregado Con Éxito');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect('cliente')->with('mensaje', 'Empleado Borrado');
    }

    public function edit ($id){
        $cliente = User::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id){
        $datosClien = request()->except(['_token','password','password_confirmation','TipoA','TipoE','TipoC', '_method']);
        User::where('id','=', $id)->update($datosClien);
        return redirect('cliente')->with('mensaje','Datos Actualizados');

    }

    public function show (){
        //
    }
}
