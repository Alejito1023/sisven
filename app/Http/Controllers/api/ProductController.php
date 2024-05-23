<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;



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
        return json_encode( ['products'=>$products]);
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

        return json_encode(['product'=>$product]);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $product = Product::find($id);
        if (is_null($product)){
            return abort(404);
        }
        $product = Product::find($id);
        $categories = DB::table('categories')
        ->orderBy('nom_cate')
        ->get();

        return json_encode(['product'=> $product, 'categories'=> $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(),[
            'nombre' => ['required', 'max:30', 'unique'],
            'cate_id' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion',
                'statusCode' => 400
            ]);
        }
        $product = Product::find($id);

        $product->nombre = $request->nombre;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->cate_id = $request->code;
        $product->save();
        return json_encode(['product' =>$product]);
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
