<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$categories = Categorie::all();
        $categories = DB::table('categories')
        ->join('products', 'categories.cate_id', '=', 'products.product_id')
        ->select('categories.*', 'products.nombre')
        ->get();
        return view('categorie.index', ['categories' =>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = DB::table('products')
        ->orderBy('nombre')
        ->get();
        return view('categorie.new', ['products' =>$productos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categorie = new Categorie();

        $categorie->nom_cate = $request->name;
        $categorie->descripcion = $request->descripcion;
        $categorie->save();
        
        $categories = DB::table('categories')
        ->join('products', 'categories.cate_id', '=', 'products.product_id')
        ->select('categories.*', 'products.nombre')
        ->get();
        return view('categorie.index', ['categories' =>$categories]);

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
    public function edit( $id)
    {
        $categorie = Categorie::find($id);
        $productos = DB::table('products')
        ->orderBy('nombre')
        ->get();
        return view('categorie.new', ['categorie' => $categorie, 'products' =>$productos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $categorie = Categorie::find($id);

        $categorie->nombre = $request->nombre;
        $categorie->descripcion = $request->descripcion;
        $categorie->save();
        
        $categories = DB::table('categories')
        ->join('products', 'categories.cate_id', '=', 'products.product_id')
        ->select('categories.*', 'products.nombre')
        ->get();
        return view('categorie.index', ['categories' =>$categories]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();

        $categories = DB::table('categories')
        ->join('products', 'categories.cate_id', '=', 'products.product_id')
        ->select('categories.*', 'products.nombre')
        ->get();
        return view('categorie.index', ['categories' =>$categories]);
    }
}
