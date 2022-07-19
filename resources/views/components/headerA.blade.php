@php
    $id = Illuminate\Support\Facades\Auth::id();
    $user = App\Models\User::find($id);
    $carrito = App\Models\ShoppingCart::where('client_id', $user->id)->first();
    $pesos = App\Models\peso::get();

    $cartDetails = App\Models\ShoppingCartDetail::where('cart_id', $carrito->id)->get();
    $productos = App\Models\producto::get();

    compact('cartDetails', 'productos');
@endphp



<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
            data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
            data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
            data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
            data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px"
            data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-inner-outer">
                <div class="rd-navbar-inner">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap">
                            <span></span>
                        </button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand">
                            <a class="brand" href="/home"><img class="brand-logo-dark"
                                    src="images/logo-famosa.png" alt="" width="198px" height="66px" /></a>
                        </div>
                    </div>
                    <div class="rd-navbar-right rd-navbar-nav-wrap">
                        <div class="rd-navbar-aside">
                            <ul class="rd-navbar-contacts-2">
                                <li>
                                    <div class="unit unit-spacing-xs">
                                        <div class="unit-left">
                                            <span class="icon mdi mdi-phone"></span>
                                        </div>
                                        <div class="unit-body">
                                            <a class="phone" href="tel:#">+591 718-999-3939</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="unit unit-spacing-xs">
                                        <div class="unit-left">
                                            <span class="icon mdi mdi-map-marker"></span>
                                        </div>
                                        <div class="unit-body">
                                            <a class="address" href="#">Calle 514 Avenida Beni 4to anillo</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-share-2">
                                <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                            </ul>
                        </div>
                        <div class="rd-navbar-main">
                            <!-- RD Navbar Nav-->
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item active">
                                    <a class="rd-nav-link" href="{{ route('home') }}">Inicio</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="{{ route('nosotros') }}">Nosotros</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="{{ route('catalogo') }}">Catálogo</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="{{ route('contacto') }}">Contáctanos</a>
                                </li>
                                <li class="rd-nav-item">
                                    <a class="rd-nav-link" href="/shoppingCartDetail">Carrito</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-open rd-navbar-fixed-element-1"
                        data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap"
                        data-multitoggle-isolate="data-multitoggle-isolate">
                        <div class="project-hamburger">
                            <span class="project-hamburger-arrow"></span><span
                                class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                        </div>
                    </div>
                    <div class="rd-navbar-project overflow-auto"
                    style="max-height: 100vh;
                    overflow: auto;
                    position: fixed;
                    ">
                        <div class="rd-navbar-project-header">
                            <h5 class="rd-navbar-project-title">Ajustes</h5>
                            <br>
                            <br>
                            <div class="rd-navbar-project-hamburger rd-navbar-project-hamburger-close"
                                data-multitoggle=".rd-navbar-inner" data-multitoggle-blur=".rd-navbar-wrap"
                                data-multitoggle-isolate="data-multitoggle-isolate">
                                <div class="project-close">
                                    <span></span><span></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <li class="rd-nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="rd-nav-link" href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                            <li class="rd-nav-item">
                                <a class="rd-nav-link" href="index.html">Configuraración Avanzada</a>
                            </li>
                        </div>


                        <br>
                        <br>


                        <div class="overflow-auto">
                            <h5
                              class=""
                              style="
                                text-align: center;
                                margin: 0 auto;
                                margin-top: 28px;
                                margin-bottom: 50px;
                              "
                            >
                              Mi carrito
                            </h5>
                            <?php $total = 0; ?>

                            <a
                              class="button button-sm button-primary"
                              style="color: black; font-size: 14px"
                              >Comprar</a
                            >
                            <div style="flex-wrap: wrap; display: flex" class="listaProductos" id="listaProductos">

                                {{-- iniciar loop --}}

                                @foreach ($cartDetails as $cartDetail)

                                    @foreach ($productos as $producto)

                                        @if ($producto->id == $cartDetail->prod_id)
                                            <div
                                            style="
                                            max-width: 44%;
                                            text-align: center;
                                            margin: 0 auto;
                                            "
                                            class=""
                                            >

                                            <article
                                                class="product wow fadeInLeft"
                                                data-wow-delay=".15s"
                                            >
                                                <div class="product-figure">
                                                    <img
                                                        src= "storage/productos/{{ $producto->image}}"
                                                        alt="producto imagen"
                                                        width="161"
                                                        height="162"
                                                    />
                                                </div>

                                                @foreach ($pesos as $peso)
                                                    @if($producto->id_Peso == $peso->id)
                                                        <h6 class="product-title">{{$producto->nombre}} - {{$peso->gramos}} Gr</h6>
                                                    @endif
                                                @endforeach
                                                <div class="product-price-wrap">
                                                    <div class="product-price">Cantidad: {{ $cartDetail->cantidad}}</div>
                                                </div>
                                                <div class="product-price-wrap">
                                                    <div class="product-price">Bs{{ $cartDetail->total}}</div>
                                                </div>

                                                <div class="">

                                                    <form action="{{ url('/shoppingCartDetail/' . $cartDetail->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <div class="button-wrap">
                                                            <button  type="submit" style="border: none"
                                                                onclick="return confirm('¿Seguro que quieres borrar?')">
                                                                <i
                                                                    class="icon mdi mdi-delete"
                                                                    style="font-size: 28px"
                                                                    >

                                                                </i>
                                                            </button>
                                                        </div>
                                                    </form>



                                                </div>
                                            </article>
                                        </div>
                                        @endif


                                    @endforeach

                                    <?php $total += $cartDetail->total; ?>

                                @endforeach


                            </div>

                            <h4>Total: {{$total}}bs</h4>
                          </div>

                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
