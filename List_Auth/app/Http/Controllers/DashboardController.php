<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }
    
}
