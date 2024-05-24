<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = DB::table('customers')
        ->join('invoices', 'customers.id', '=', 'invoices.id')
        ->select('customers.*', 'invoices.number')
        ->get();
        return view('customer.index', ['customers' =>$customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $invoices = DB::table('invoices')
        ->orderBy('number')
        ->get();
        return view('customer.new', ['invoices'=>$invoices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->document_number = $request->document_number;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->birthday = $request->birthday;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->save();
        
        $customers = DB::table('customers')
        ->join('invoices', 'customers.id', '=', 'invoices.id')
        ->select('customers.*', 'invoices.number')
        ->get();
        return view('customer.index', ['customers' =>$customers]);
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
        $customer = Customer::find($id);
        $invoices = DB::table('invoices')
        ->orderBy('number')
        ->get();
        return view('pay_mode.edit', ['customer'=>$customer,'invoices'=>$invoices]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::find($id);

        $customer->document_number = $request->document_number;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->birthday = $request->birthday;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->save();
        
        $customers = DB::table('customers')
        ->join('invoices', 'customers.id', '=', 'invoices.id')
        ->select('customers.*', 'invoices.number')
        ->get();
        return view('customer.index', ['customers' =>$customers]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        $customers = DB::table('customers')
        ->join('invoices', 'customers.id', '=', 'invoices.id')
        ->select('customers.*', 'invoices.number')
        ->get();
        return view('customer.index', ['customers' =>$customers]);
    }
}
