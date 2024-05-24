<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayMode;
use Illuminate\Support\Facades\DB;

class PayModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pay_mode = new PayMode();

        $pay_mode->name = $request->name;
        $pay_mode->observation = $request->observation;
        $pay_mode->save();
        return json_encode(['pay_mode'=>$pay_mode]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pay_mode= PayMode::find($id);
        $invoices = DB::table('invoices')
        ->orderBy('number')
        ->get();
        return json_encode(['pay_mode'=>$pay_mode, 'invoices'=>$invoices]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pay_mode= PayMode::find($id);
        $pay_mode->name = $request->name;
        $pay_mode->observation = $request->observation;
        $pay_mode->save();
        return json_encode(['pay_mode'=>$pay_mode]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = DB::table('categories')
        ->join('products', 'categories.cate_id', '=', 'products.product_id')
        ->select('categories.*', 'products.nombre')
        ->get();
        return json_encode(['categories'=>$categories, 'success'=>true]);
    }
}
