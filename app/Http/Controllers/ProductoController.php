<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Http\Requests\StoreproductoRequest;
use App\Http\Requests\UpdateproductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos'] = producto::paginate(10);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductoRequest $request)
    {
        $datosProd = producto::create($request->validated());
        $datosProd = request()->except(['_token']);
        return redirect('producto')->with('mensaje','Producto Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductoRequest  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproductoRequest $request, $id)
    {
        $datosProd = request()->except(['_token','_method']);
        producto::where('id','=', $id)->update($datosProd);
        return redirect('producto')->with('mensaje','Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        producto::destroy($id);
        return redirect('producto')->with('mensaje', 'Producto Borrado');
    }
}
