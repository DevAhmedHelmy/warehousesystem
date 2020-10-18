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
use App\Models\ClientAccount;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class SaleBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:sale-bills-list|sale-bills-create|sale-bills-edit|sale-bills-delete', ['only' => ['index','store']]);
        $this->middleware('permission:sale-bills-create', ['only' => ['create','store']]);
        $this->middleware('permission:sale-bills-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sale-bills-delete', ['only' => ['destroy']]);
    }

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
        // $products = Product::all();
        // $clients = Client::all();
        // $stocks= Stock::with('products')->get();
        return view('admin.sales.salebills.form',
            [
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

        $saleBill = SaleBill::create([
                'bill_number' => $data['bill_number'],
                'discount' => ($data['bill_discount'])??0,
                'tax' => ($data['bill_tax'])??0,
                'total' => $data['bill_total'],
                'client_id' =>$data['client_id'],
                'stock_id' =>$data['stock_id'],
                'bill_type' => $data['bill_type']
                ]);

        if($saleBill && $request->product_id != '')
        {
            $rows =[];
            DB::transaction(function () use($data,$saleBill,$request){
                foreach ($request->product_id as $key => $value) {
                    InvoiceSaleBill::create([
                    'quantity' => $data['quantity'][$key],
                    'discount' => ($data['discount'][$key])??0,
                    'tax' => ($data['tax'][$key])??0,
                    'total' => $data['total'][$key],
                    'price'=> $data['price'][$key],
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
                              'saleBill_id' => $saleBill->id,
                              'created_at'=>now(),
                              'updated_at'=>now(),
                             ];
                    } else {
                        abort(403);
                    }
                }
                \DB::table('stock_products')->insert($rows);

                if($saleBill->bill_type == 'cash')
                {
                    ClientAccount::create([
                        'client_id' => $saleBill->client_id,
                        'sale_bill_id' => $saleBill->id,
                        'total' => $saleBill->total
                    ]);
                } 
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

        $saleBill = SaleBill::with(['invoiceSaleBills','invoiceSaleBills.product'])->findOrFail($id);
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
        $saleBill = SaleBill::with(['invoiceSaleBills','invoiceSaleBills.product'])->findOrFail($id);

        session()->flash('saleBill',$saleBill);

        return view('admin.sales.salebills.form',
            [
                'saleBill' => $saleBill
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleBill  $saleBill
     * @return \Illuminate\Http\Response
     */
    public function update(SaleBillRequest $request, $id)
    {
        $data = $request->all();


        $saleBill = SaleBill::findOrFail($id);

        $saleBill->update([
                'bill_number' => $data['bill_number'],
                'discount' => ($data['bill_discount'])??0,
                'tax' => ($data['bill_tax'])??0,
                'total' => $data['bill_total'],
                'client_id' =>$data['client_id'],
                'stock_id' =>$data['stock_id'],
                ]);

        if($saleBill && $request->product_id != '')
        {
            $saleBill->invoiceSaleBills()->delete();

            // delete transations of product in stock

             \DB::table('stock_products')
             ->where('stock_id', $data['stock_id'])
             ->where('saleBill_id', $saleBill->id)
             ->delete();

            $rows =[];
            DB::transaction(function () use($data,$saleBill,$request){
                foreach ($request->product_id as $key => $value) {
                    InvoiceSaleBill::create([
                    'quantity' => $data['quantity'][$key],
                    'discount' => ($data['discount'][$key])??0,
                    'tax' => ($data['tax'][$key])??0,
                    'total' => $data['total'][$key],
                    'price'=> $data['price'][$key],
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleBill  $saleBill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SaleBill::findOrFail($id)->delete();
        return redirect()->route('salebills.index')
                        ->with('success',trans('general.deleted_Successfully'));
    }
}
