<?php

namespace App\Http\Controllers\Admin\SaleBill;

use App\Models\Client;
use App\Models\Product;
use App\Models\SaleBill;
use Illuminate\Http\Request;
use App\Models\InvoiceSaleBill;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleBillRequest;

class SaleBillController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $salebills = SaleBill::paginate(5);
        return view('admin.sales.salebills.index',['salebills' => $salebills])
                ->with('i', ($request->input('page', 1) - 1) * 5);
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


        if($saleBill && $request->product_id != '')
        {
            foreach($request->product_id as $key => $value)
            {
                InvoiceSaleBill::create([
                    'quantity' => $data['quantity'][$key],
                    'discount' => $data['dicount'][$key],
                    'tax' => $data['tax'][$key],
                    'total' => $data['quantity'][$key],
                    'product_id' => $data['product_id'][$key],
                    'sale_bill_id' => $saleBill->id
                ]);
            }

        }


        return redirect()->route('salebills.index')
                        ->with('success',trans('general.created_Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleBill  $saleBill
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saleBill = SaleBill::findOrfail($id);

        return view('admin.sales.salebills.show',['saleBill'=>$saleBill]);
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
