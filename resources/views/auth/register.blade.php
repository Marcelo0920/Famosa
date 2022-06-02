@extends('layouts.app-master')

@section('content')
    
    <form action="/register" method="POST">
        @csrf
        <br><br>
        <h1> CREATE ACCOUNT </h1>
        @include('layouts.partials.messages')
        <div class="form-floating mb-3">
            <input type="text" placeholder="name" name="name" class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Name Complete</label>
          </div>
          <div class="form-floating mb-3">
            <input type="integer" placeholder="ci" name="ci" class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">CI</label>
          </div>
          <!-- <div class="form-floating mb-3">
            <input type="text" placeholder="sexo" name="sexo" class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Sexo</label>
          </div>-->

          <h5>Genere</h5>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault1" value="M">
            <label class="form-check-label" for="flexRadioDefault1">
              Masculine
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="sexo" id="flexRadioDefault2" value="F">
            <label class="form-check-label" for="flexRadioDefault2">
              Female
            </label>
          </div>
          <br>

          <div class="form-floating mb-3">
            <input type="integer" placeholder="telefono" name="telefono" class="form-control" id="exampleInputPassword1">
            <label for="exampleInputPassword1" class="form-label">Phone</label>
          </div>
        <div class="form-floating mb-3">
            <input type="email" placeholder="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="form-floating mb-3">
            <input type="password" placeholder="password" name="password" class="form-control" id="exampleInputPassword1">
          <label for="exampleInputPassword1" class="form-label">Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" placeholder="password_confirmation" name="password_confirmation" class="form-control" id="exampleInputPassword1">
          <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
        </div>

        <div class="form-floating mb-3">
          <input type="hidden" placeholder="" name="TipoC" class="form-control" id="exampleInputPassword1" value="1">
        </div>

        <div class="form-floating mb-3">
          <input type="hidden" placeholder="" name="TipoE" class="form-control" id="exampleInputPassword1" value="0">
        </div>

        <div class="form-floating mb-3">
          <input type="hidden" placeholder="" name="TipoA" class="form-control" id="exampleInputPassword1" value="0">
        </div>

        <button type="submit" class="btn btn-primary">Create Account</button>
      </form>
      <br><br><br><br><br>
    
@endsection

