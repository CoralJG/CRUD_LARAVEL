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

	public function index()
	{
		$productos = Auth::user()->productos;
		return view('productos.index', compact('productos'));
	}

	public function create()
	{
		return view('productos.create');
	}

	public function store(CreateProductRequest $request)
	{
		$user_id = Auth::id();
		Producto::create([
			'name' => $request->input('name'),
			'description' => $request->input('description'),
			'price' => $request->input('price'),
			'user_id' => $user_id
		]);
        return redirect()->route('productos.index');
	}
	public function edit($id)
	{
		$producto = Producto::find($id);
		return view('productos.edit', compact('producto'));
	}


	public function detail($id)
	{
		$producto = Producto::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
		return view('productos.detail', compact('producto'));
	}


	public function update(CreateProductRequest $request, $id){
        $producto = Producto::find($id);
        $producto->update($request->validated());
        return redirect()->route('productos.index', compact('producto'));
    }


	public function destroy(Request $request, $id){
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index', compact('producto'));
    }

}
