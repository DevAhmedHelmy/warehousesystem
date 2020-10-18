<?php

namespace App\Http\Controllers\Admin\Stock;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use App\Http\Controllers\Controller;
use App\Models\Branch;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stocks = Stock::all();
        $branches = Branch::all();
        return view('admin.stocks.index',['stocks' => $stocks,'branches'=>$branches])->with('i', ($request->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();
        return view('admin.stocks.form',['branches'=>$branches]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockRequest $request)
    {
        $data = $request->all();
        Stock::create($data);
        return redirect()->route('stocks.index')
                        ->with('success',trans('general.created_Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        $products = $stock->getProducts(); 
        return view('admin.stocks.show',['stock' => $stock, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {

    }


    public function transaction($stock_id, $product_id)
    {
        $stock = Stock::findOrfail($stock_id);
        $transactions = $stock->products()->wherePivot('product_id',$product_id)->latest()->get();
        return view('admin.stocks.transactions',['transactions' => $transactions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $data = $request->all();
        $stock->update($data);
        return redirect()->route('stocks.index')
                        ->with('success',trans('general.updated_Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stocks.index')
                        ->with('success',trans('general.deleted_Successfully'));
    }
}
