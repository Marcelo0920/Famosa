<?php

namespace App\Http\Controllers;

use App\Models\peso;
use App\Http\Requests\StorepesoRequest;
use App\Http\Requests\UpdatepesoRequest;

class PesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['pesos'] = peso::paginate(10);
        return view('peso.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepesoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepesoRequest $request)
    {
        $datosPeso = peso::create($request->validated());
        $datosPeso = request()->except(['_token']);
        return redirect('peso')->with('mensaje','Peso Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function show(peso $peso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peso = peso::findOrFail($id);
        return view('peso.edit', compact('peso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepesoRequest  $request
     * @param  \App\Models\peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepesoRequest $request, $id)
    {
        $datosPeso = request()->except(['_token','_method']);
        peso::where('id','=', $id)->update($datosPeso);
        return redirect('peso')->with('mensaje','Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\peso  $peso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        peso::destroy($id);
        return redirect('peso')->with('mensaje', 'Peso Borrado');
    }
}
