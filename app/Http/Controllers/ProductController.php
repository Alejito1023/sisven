<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')
        ->join('categories', 'products.cate_id', '=', 'categories.cate_id')
        ->select('products.*', 'categories.nom_cate')
        ->get();
        return view('product.index', ['products' =>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')
        ->orderBy('nom_cate')
        ->get();
        return view('product.new', ['categories' =>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->nombre = $request->nombre;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->cate_id = $request->code;
        $product->save();
        
        $products = DB::table('products')
        ->join('categories', 'products.cate_id', '=', 'categories.cate_id')
        ->select('products.*', 'categories.nom_cate')
        ->get();
        return view('product.index', ['products' =>$products]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categories = DB::table('categories')
        ->orderBy('nom_cate')
        ->get();
        return view('product.new', ['product' => $product, 'categories' =>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->nombre = $request->nombre;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->cate_id = $request->code;
        $product->save();
        
        $products = DB::table('products')
        ->join('categories', 'products.cate_id', '=', 'categories.cate_id')
        ->select('products.*', 'categories.nom_cate')
        ->get();
        return view('product.index', ['products' =>$products]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        $products = DB::table('products')
        ->join('categories', 'products.cate_id', '=', 'categories.cate_id')
        ->select('products.*', 'categories.nom_cate')
        ->get();
        return view('product.index', ['products' =>$products]);
    }
}
