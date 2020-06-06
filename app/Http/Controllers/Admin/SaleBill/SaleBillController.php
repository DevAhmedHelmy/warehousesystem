<?php

namespace App\Http\Controllers\Admin\SaleBill;

use App\Models\Client;
use App\Models\Product;
use App\Models\SaleBill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleBillRequest;

class SaleBillController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salebills = SaleBill::paginate(5);
        return view('admin.sales.salebills.index',['salebills' => $salebills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $clients = Client::all();
        return view('admin.sales.salebills.form',
            [
                'products' => $products,
                'clients' => $clients,
                'saleBill' => new SaleBill()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleBillRequest $request)
    {
        $data = $request->all();

        $saleBill = SaleBill::create(['bill_number' => $data['bill_number'],'client_id' =>$data['client_id']]);
        if($saleBill)
        {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleBill  $saleBill
     * @return \Illuminate\Http\Response
     */
    public function show(SaleBill $saleBill)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleBill  $saleBill
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleBill $saleBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleBill  $saleBill
     * @return \Illuminate\Http\Response
     */
    public function update(SaleBillRequest $request, SaleBill $saleBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleBill  $saleBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleBill $saleBill)
    {
        //
    }
}
