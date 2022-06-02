<!--Formulario de creación  de administrador-->

@extends('layouts.app-master')

@section('content')

    <div id="app" class="wrapper" style="position: absolute; left:0">
        @include('layouts.sidebar')
        <div id="content">

            <form action="{{url('/peso')}}" method="POST" style="margin: auto; width:200%">
                @csrf
                @include('peso.form', ['modo' => 'CREATE'])
            </form>
            <br><br><br><br><br>
            
        </div>
    </div>

@endsection