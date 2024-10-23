<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Producto;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    use AuthorizesRequests;

    public function index(){
        $productos = Auth::user()->productos; //Autenticación
        return view('productos.index', compact('productos'));
    }

    public function create(){
        return view('productos.create');
    }

    public function store(CreateProductRequest $request){
        Auth::user()->productos()->create($request->validated()); //Autenticación
        return redirect()->route('productos.index');
    }

    public function edit($id){
        $producto = Producto::find($id);
        return view('productos.edit', compact('producto'));
    }

    public function detail(Request $request, $id){
        $producto = Producto::find($id);
        return view('productos.detail', compact('producto'));
    }

    public function update(CreateProductRequest $request, $id){
        $producto = Producto::find($id);
        $producto->update($request->validated());
        return redirect()->route('productos.index');
    }

    public function destroy(Request $request, $id){
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
