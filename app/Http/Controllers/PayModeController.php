<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PayMode;


class PayModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pay_modes = DB::table('pay_mode')
        ->join('invoices', 'pay_mode.id', '=', 'invoices.id')
        ->select('pay_mode.*', 'invoices.number')
        ->get();
        return view('pay_mode.index', ['pay_modes' =>$pay_modes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $invoices = DB::table('invoices')
        ->orderBy('number')
        ->get();
        return view('pay_mode.new', ['invoices'=>$invoices]);
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
        
        $pay_modes = DB::table('pay_mode')
        ->join('invoices', 'pay_mode.id', '=', 'invoices.id')
        ->select('pay_mode.*', 'invoices.number')
        ->get();
        return view('pay_mode.index', ['pay_modes' =>$pay_modes]);
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
        $pay_mode = PayMode::find($id);
        $invoices = DB::table('invoices')
        ->orderBy('number')
        ->get();
        return view('pay_mode.edit', ['pay_mode'=>$pay_mode,'invoices'=>$invoices]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pay_mode = PayMode::find($id);

        $pay_mode->name = $request->name;
        $pay_mode->observation = $request->observation;
        $pay_mode->save();
        
        $pay_modes = DB::table('pay_mode')
        ->join('invoices', 'pay_mode.id', '=', 'invoices.id')
        ->select('pay_mode.*', 'invoices.number')
        ->get();
        return view('pay_mode.index', ['pay_modes' =>$pay_modes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pay_mode = PayMode::find($id);
        $pay_mode->delete();

        $pay_modes = DB::table('pay_mode')
        ->join('invoices', 'pay_mode.id', '=', 'invoices.id')
        ->select('pay_mode.*', 'invoices.number')
        ->get();
        return view('pay_mode.index', ['pay_modes' =>$pay_modes]);
    }
}
