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
                    @foreach ( $empleados as $empleado )
                        <tr>
                            @if ($empleado->TipoE == 1)
                                <td>{{$empleado->id}}</td>
                                <td>{{$empleado->name}}</td>
                                <td>{{$empleado->ci}}</td>
                                <td>{{$empleado->sexo}}</td>
                                <td>{{$empleado->telefono}}</td>
                                <td>{{$empleado->domicilio}}</td>
                                <td>{{$empleado->estado}}</td>
                                <td>{{$empleado->email}}</td>
                                <td>
                                    <a href="{{url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-success">  Edit </a> || 
                                    <form action="{{url('/empleado/'.$empleado->id)}}" method="POST" class="d-inline">
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
            {!! $empleados->links() !!}
            <a href="{{url('empleado/create')}}"> <button  type="submit" class="btn btn-primary" > + New </button> </a>
        </div>
    </div>

@endsection