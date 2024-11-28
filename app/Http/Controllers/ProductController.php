<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json($products);
    }

    public function update(Request $request, $id){
        $products = Product::find($id);
        $products->update($request->all());
        return response()->json($products);
    }

    public function show($id){
        $products = Product::find($id);
        return response()->json($products);
    }

    public function destroy($id){
        $products = Product::find($id);
        $products->delete();
        return response()->json(['message' => 'Producto eliminado']);
    }

    public function create(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Crear el producto
        $product = Product::create($validatedData);

        // Retornar el producto creado como respuesta JSON
        return response()->json($product, 201, ['message' => 'Producto creado']); // 201 es el código HTTP para "Creado"
    }
}

