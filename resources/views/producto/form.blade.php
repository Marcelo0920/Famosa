<br>
                <h1> {{$modo}} PRODUCTO </h1>
                @include('layouts.partials.messages')
                <div class="form-floating mb-3">
                    <input type="text" placeholder="nombre" name="nombre" class="form-control" id="nombre" value="{{isset($producto->nombre)?$producto->nombre:old('nombre')}}">
                    <label for="exampleInputPassword1" class="form-label">Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" placeholder="descripcion" name="descripcion" class="form-control" id="descripcion" value="{{isset($producto->descripcion)?$producto->descripcion:old('descripcion')}}">
                    <label for="exampleInputPassword1" class="form-label">Descripción</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="float" placeholder="precioU" name="precioU" class="form-control" id="precioU" value="{{isset($producto->precioU)?$producto->precioU:old('precioU')}}">
                    <label for="exampleInputPassword1" class="form-label">Precio Unitario</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="integer" placeholder="stock" name="stock" class="form-control" id="stock" value="{{isset($producto->stock)?$producto->stock:old('stock')}}">
                    <label for="exampleInputPassword1" class="form-label">Stock</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="integer" placeholder="cantMin" name="cantMin" class="form-control" id="cantMin" value="{{isset($producto->cantMin)?$producto->cantMin:old('cantMin')}}">
                    <label for="exampleInputPassword1" class="form-label">Cantidad Minima</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" placeholder="estado" name="estado" class="form-control" id="estado" value="{{isset($producto->estado)?$producto->estado:old('estado')}}">
                    <label for="exampleInputPassword1" class="form-label">Estado</label>
                </div>
                <h5>Peso</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="id_Peso" id="flexRadioDefault1" value="1" 
                    @if ((isset($producto->id_Peso)?$producto->id_Peso:old('id_Peso')) == '1')
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                    400 Gramos
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="id_Peso" id="flexRadioDefault1" value="2"
                    @if ((isset($producto->id_Peso)?$producto->id_Peso:old('id_Peso')) == '2')
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                    1000 Gramos
                    </label>
                </div>
                <br>
                <h5>Tipo De Producto</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="id_Tipo" id="flexRadioDefault1" value="1" 
                    @if ((isset($producto->id_Tipo)?$producto->id_Tipo:old('id_Tipo')) == '1')
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault1">
                    Fideos
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="id_Tipo" id="flexRadioDefault1" value="2"
                    @if ((isset($producto->id_Tipo)?$producto->id_Tipo:old('id_Tipo')) == '2')
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                    Harinas
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="id_Tipo" id="flexRadioDefault1" value="3"
                    @if ((isset($producto->id_Tipo)?$producto->id_Tipo:old('id_Tipo')) == '3')
                        checked
                    @endif>
                    <label class="form-check-label" for="flexRadioDefault2">
                    Salvados
                    </label>
                </div>
                <br>

                <button type="submit" class="btn btn-primary" value="update">{{$modo}} PRODUCTO</button>

                <a href="{{url('producto')}}" class="btn btn-success">  Regresar  </a>