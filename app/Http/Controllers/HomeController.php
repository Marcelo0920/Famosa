<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ShoppingCart;
use App\Models\ShoppingCartDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\producto;


date_default_timezone_set('America/La_Paz');

class HomeController extends Controller
{

    public function index()
    {
       /*  $id = Auth::id();
        $user = User::find($id);

        $carrito = ShoppingCart::where('client_id', $user->id)->first();
        $cartDetails = ShoppingCartDetail::where('cart_id', $carrito->id);
        $productos = producto::get(); */

        if(auth()->user()){
            $TipoA = auth()->user()->TipoA;
            $TipoE = auth()->user()->TipoE;
            if ($TipoA == 1) {
                return view('home.indexAdm');
            }
            if ($TipoE == 1) {
                return view('home.indexEmp');
            }
        }
        return view('home.index');
    }
}
