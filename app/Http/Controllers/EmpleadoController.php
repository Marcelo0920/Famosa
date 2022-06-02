<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class EmpleadoController extends Controller
{
    public function index(){
        $datos['empleados'] = User::paginate(10);
        return view('empleado.index', $datos);
    }

    public function create(){
        return view('empleado.create');
    }

    public function store(RegisterRequest $request){
        $datosEmp = User::create($request->validated());
        $datosEmp = request()->except(['_token','password','password_confirmation','TipoA','TipoE','TipoC']);
        return redirect('empleado')->with('mensaje','Empleado Agregado Con Éxito');
    }

    public function destroy($id){
        User::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado Borrado');
    }

    public function edit ($id){
        $empleado = User::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    public function update(Request $request, $id){
        $datosEmp = request()->except(['_token','password','password_confirmation','TipoA','TipoE','TipoC', '_method']);
        User::where('id','=', $id)->update($datosEmp);
        return redirect('empleado')->with('mensaje','Datos Actualizados');

    }

    public function show (){
        //
    }
}
