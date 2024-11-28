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
}
