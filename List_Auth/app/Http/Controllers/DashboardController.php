<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index(){
		$user_id = Auth::id();
		$productos = Producto::where('user_id', operator: $user_id)->get();
        return view('productos.index', compact('productos'));
    }
    
}
