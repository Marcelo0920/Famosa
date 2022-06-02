<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index(){
        $datos['administradores'] = User::paginate(10);
        return view('administrador.index', $datos);
    }

    public function create(){
        return view('administrador.create');
    }

    public function store(RegisterRequest $request){
        $datosAdmin = User::create($request->validated());
        $datosAdmin = request()->except(['_token','password','password_confirmation','TipoA','TipoE','TipoC']);
        return redirect('administrador')->with('mensaje','Administrador Agregado Con Éxito');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect('administrador')->with('mensaje', 'Administrador Borrado');
    }

    public function edit ($id){
        $administrador = User::findOrFail($id);
        return view('administrador.edit', compact('administrador'));
    }

    public function update(Request $request, $id){
        $datosAdmin = request()->except(['_token','password','password_confirmation','TipoA','TipoE','TipoC', '_method']);
        User::where('id','=', $id)->update($datosAdmin);
        return redirect('administrador')->with('mensaje','Datos Actualizados');
    }

    public function show (){
        //
    }
}
