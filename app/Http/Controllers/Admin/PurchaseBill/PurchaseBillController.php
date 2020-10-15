<?php

namespace App\Http\Controllers\Admin\PurchaseBill;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\PurchaseBill;
use Illuminate\Http\Request;
use App\Models\InvoicePurchaseBill;
use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseBillRequest;
use DB;
class PurchaseBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $purchasebills = PurchaseBill::paginate(5);
        return view('admin.purchases.purchaseBill.index',['purchasebills' => $purchasebills])
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
        $suppliers = Supplier::all();
        $stocks= Stock::with('products')->get();
        return view('admin.purchases.purchaseBill.form',
            [
                'products' => $products,
                'suppliers' => $suppliers,
                'stocks' => $stocks,
                'purchasebill' => new PurchaseBill()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseBillRequest $request)
    {
        $data = $request->all();

        $purchaseBill = PurchaseBill::create([
                'bill_number' => $data['bill_number'],
                'discount' => ($data['bill_discount'])??0,
                'tax' => ($data['bill_tax'])??0,
                'total' => $data['bill_total'],
                'supplier_id' =>$data['supplier_id'],
                'stock_id' =>$data['stock_id'],
                ]);

        if($purchaseBill && $request->product_id != '')
        {
            $rows =[];
            DB::transaction(function () use($data,$purchaseBill,$request){
                foreach ($request->product_id as $key => $value) {
                    InvoicePurchaseBill::create([
                    'quantity' => $data['quantity'][$key],
                    'discount' => ($data['discount'][$key])??0,
                    'tax' => ($data['tax'][$key])??0,
                    'total' => $data['total'][$key],
                    'price'=> $data['price'][$key],
                    'product_id' => $data['product_id'][$key],
                    'stock_id' => $data['stock_id'],
                    'purchase_bill_id' => $purchaseBill->id
                ]);

                    $product = \DB::table('stock_products')
                     ->where('stock_id', $data['stock_id'])
                     ->where('product_id', $data['product_id'][$key])
                     ->orderBy('created_at', 'desc')
                     ->first();

                    if ($product !== null) {
                        $rows[] = ['first_balance'=>$product->end_balance,
                              'additions'=>$data['quantity'][$key],
                              'end_balance'=> $product->end_balance + $data['quantity'][$key],
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


        return redirect()->route('purchasebills.index')
                        ->with('success',trans('general.created_Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseBillRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
