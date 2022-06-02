@extends('layouts.app-master')

@section('content')

    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content"> <br>

                @if (Session::has('mensaje'))
                <div class="alert alert-success alert dismissible" role="alert">
                    {{Session::get('mensaje')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="background-color: #d1e7dd"
                        style="border: #d1e7dd">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

            <table class="table table-light">

                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio Unitario</th>
                        <th>Stock</th>
                        <th>Cantidad Minima</th>
                        <th>Estado</th>
                        <th>ID Peso</th>
                        <th>ID Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $productos as $producto )
                        <tr>
                                <td>{{$producto->id}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->precioU}}</td>
                                <td>{{$producto->stock}}</td>
                                <td>{{$producto->cantidadMin}}</td>
                                <td>{{$producto->estado}}</td>
                                <td>{{$producto->id_Peso}}</td>
                                <td>{{$producto->id_Tipo}}</td>
                                <td>
                                    <a href="{{url('/producto/'.$producto->id.'/edit')}}" class="btn btn-success">  Edit </a> || 
                                    <form action="{{url('/producto/'.$producto->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que quieres borrar?')" value="Delete">
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $productos->links() !!}
            <a href="{{url('producto/create')}}"> <button  type="submit" class="btn btn-primary" > + New </button> </a>
        </div>
    </div>

@endsection