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
                        <th>CI</th>
                        <th>Sexo</th>
                        <th>Telefono</th>
                        <th>Domicilio</th>
                        <th>Estado</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $administradores as $administrador )
                        <tr>
                            @if ($administrador->TipoA == 1)
                                <td>{{$administrador->id}}</td>
                                <td>{{$administrador->name}}</td>
                                <td>{{$administrador->ci}}</td>
                                <td>{{$administrador->sexo}}</td>
                                <td>{{$administrador->telefono}}</td>
                                <td>{{$administrador->domicilio}}</td>
                                <td>{{$administrador->estado}}</td>
                                <td>{{$administrador->email}}</td>
                                <td>
                                    <a href="{{url('/administrador/'.$administrador->id.'/edit')}}" class="btn btn-success">  Edit </a> || 
                                    <form action="{{url('/administrador/'.$administrador->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que quieres borrar?')" value="Delete">
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $administradores->links() !!}
            <a href="{{url('administrador/create')}}"> <button  type="submit" class="btn btn-primary" > + New </button> </a>
        </div>
    </div>

@endsection