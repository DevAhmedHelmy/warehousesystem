<?php

namespace App\Http\Controllers\Admin\SaleBill;

use App\Models\Client;
use App\Models\Product;
use App\Models\SaleBill;
use Illuminate\Http\Request;
use App\Models\InvoiceSaleBill;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleBillRequest;
use App\Models\Stock;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

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
        $stocks= Stock::with('products')->get();
        return view('admin.sales.salebills.form',
            [
                'products' => $products,
                'clients' => $clients,
                'stocks' => $stocks,
                'saleBill' => new SaleBill()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $saleBill = SaleBill::create([
                'bill_number' => $data['bill_number'],
                'discount' => $data['bill_discount'],
                'tax' => $data['bill_tax'],
                'total' => $data['bill_total'],
                'client_id' =>$data['client_id']
                ]);

        if($saleBill && $request->product_id != '')
        {
            $rows =[];
            DB::transaction(function () use($data,$saleBill,$request){
                foreach ($request->product_id as $key => $value) {
                    InvoiceSaleBill::create([
                    'quantity' => $data['quantity'][$key],
                    'discount' => $data['discount'][$key],
                    'tax' => $data['tax'][$key],
                    'total' => $data['quantity'][$key],
                    'product_id' => $data['product_id'][$key],
                    'stock_id' => $data['stock_id'],
                    'sale_bill_id' => $saleBill->id
                ]);

                    $product = \DB::table('stock_products')
                     ->where('stock_id', $data['stock_id'])
                     ->where('product_id', $data['product_id'][$key])
                     ->orderBy('created_at', 'desc')
                     ->first();

                    if ($product !== null) {
                        $rows[] = ['first_balance'=>$product->end_balance,
                              'outgoing'=>$data['quantity'][$key],
                              'end_balance'=> $product->end_balance - $data['quantity'][$key],
                              'product_id'=>$data['product_id'][$key],
                              'stock_id'=>$data['stock_id'],
                              'created_at'=>now(),
                              'updated_at'=>now(),
                             ];
                    } else {
                        abort(403);
                    }
                }
                \DB::table('stock_products')->insert($rows);
            });
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
        // $saleBill = SaleBill::where('sale_bills.id',$id)
        //             ->leftJoin('invoice_sale_bills','sale_bills.id','=','invoice_sale_bills.sale_bill_id')
        //             ->select('sale_bills.id','invoice_sale_bills.*')
        //             ->first();

        $saleBill = SaleBill::with('invoiceSaleBills')
                            ->findOrFail($id);
        dd($saleBill);
        return view('admin.sales.salebills.show',['saleBill'=>$saleBill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleBill  $saleBill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
