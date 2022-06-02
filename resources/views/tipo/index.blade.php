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
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ( $tipos as $tipo )
                        <tr>
                            <td>{{$tipo->id}}</td>
                            <td>{{$tipo->nombre}}</td>
                            <td>
                                <a href="{{url('/tipo/'.$tipo->id.'/edit')}}" class="btn btn-success">  Edit </a> || 
                                <form action="{{url('/tipo/'.$tipo->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro que quieres borrar?')" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $tipos->links() !!}
            <a href="{{url('tipo/create')}}"> <button  type="submit" class="btn btn-primary" > + New </button> </a>
        </div>
    </div>

@endsection