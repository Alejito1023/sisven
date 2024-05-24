<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\PayMode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = DB::table('categories')
        ->join('products', 'categories.cate_id', '=', 'products.product_id')
        ->select('categories.*', 'products.nombre')
        ->get();
        return json_encode(['categories' =>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {
       
        $categorie = new Categorie();
        $categorie->nom_cate = $request->nom_cate;
        $categorie->descripcion = $request->descripcion;
        $categorie->save();
        return json_encode(['categorie' => $categorie]);
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response 
     */
    public function show( $id)
    {
        $categorie = Categorie::find($id);
        if (is_null($categorie)){
            return abort(404);
        }
        $categorie = Categorie::find($id);
        $productos = DB::table('products')
        ->orderBy('nombre')
        ->get();
        return json_encode(['categorie' =>$categorie, 'products' =>$productos]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response 
     */
    public function update(Request $request,  $id)
    {
        $validate = Validator::make($request->all(),[
            'nom_cate' => ['required', 'max:30', 'unique'],
            'product_id' => ['required', 'numeric', 'min:1']
        ]);

        if ($validate->fails()){
            return response()->json([
                'msg' => 'Se produjo un error en la validacion de la informacion',
                'statusCode' => 400
            ]);
        }
        
        
        $categorie = Categorie::find($id);
        $categorie->nombre = $request->nombre;
        $categorie->descripcion = $request->descripcion;
        $categorie->save();
        return json_encode(['categorie' => $categorie]);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response 
     */
    public function destroy( $id)
    {
    
        $pay_mode = PayMode::find($id);
        $pay_mode->delete();
        $pay_modes = DB::table('pay_mode')
        ->join('invoices', 'pay_mode.id', '=', 'invoices.id')
        ->select('pay_mode.*', 'invoices.number')
        ->get();
        return json_encode(['pay_modes'=>$pay_modes, 'success'=>true]);
    }
}
