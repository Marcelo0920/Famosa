<br>
                <h1> {{$modo}} CATEGORIA </h1>
                @include('layouts.partials.messages')
                <div class="form-floating mb-3">
                    <input type="text" placeholder="nombre" name="nombre" class="form-control" id="nombre" value="{{isset($categoria->nombre)?$categoria->nombre:old('nombre')}}">
                    <label for="exampleInputPassword1" class="form-label">Nombre</label>
                </div>

                <h5>Tipo De Producto</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="id_Tipo" id="flexRadioDefault1" value="1" 
                    @if ((isset($categoria->id_Tipo)?$categoria->id_Tipo:old('sexo')) == '1')
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                    Fideos
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="id_Tipo" id="flexRadioDefault1" value="2"
                    @if ((isset($categoria->id_Tipo)?$categoria->id_Tipo:old('id_Tipo')) == "2")
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                    Harinas
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="id_Tipo" id="flexRadioDefault1" value="3"
                    @if ((isset($categoria->id_Tipo)?$categoria->id_Tipo:old('id_Tipo')) == "3")
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                    Salvados
                    </label>
                </div>
                <br>

                <button type="submit" class="btn btn-primary" value="update">{{$modo}} CATEGORIA</button>

                <a href="{{url('categoria')}}" class="btn btn-success">  Regresar  </a>