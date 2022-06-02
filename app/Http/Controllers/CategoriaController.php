<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Http\Requests\StorecategoriaRequest;
use App\Http\Requests\UpdatecategoriaRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['categorias'] = categoria::paginate(10);
        return view('categoria.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecategoriaRequest $request)
    {
        $datosCateg = categoria::create($request->validated());
        $datosCateg = request()->except(['_token']);
        return redirect('categoria')->with('mensaje','Categoria Agregada Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoriaRequest  $request
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoriaRequest $request, $id)
    {
        $datosCateg = request()->except(['_token', '_method']);
        categoria::where('id','=', $id)->update($datosCateg);
        return redirect('categoria')->with('mensaje','Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categoria::destroy($id);
        return redirect('categoria')->with('mensaje', 'Categoria Borrada');
    }
}
