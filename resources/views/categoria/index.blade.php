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
                        <th>ID Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $categorias as $categoria )
                        <tr>
                                <td>{{$categoria->id}}</td>
                                <td>{{$categoria->nombre}}</td>
                                <td>{{$categoria->id_Tipo}}</td>
                                <td>
                                    <a href="{{url('/categoria/'.$categoria->id.'/edit')}}" class="btn btn-success">  Edit </a> || 
                                    <form action="{{url('/categoria/'.$categoria->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que quieres borrar?')" value="Delete">
                                    </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $categorias->links() !!}
            <a href="{{url('categoria/create')}}"> <button  type="submit" class="btn btn-primary" > + New </button> </a>
        </div>
    </div>

@endsection