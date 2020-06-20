<?php

namespace App\Http\composers;

use Illuminate\View\View;
use App\Models\Client;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleBillComposer
{

    protected $request;


    public function __construct(Request $request)
    {

        $this->request = $request;

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $clients = Client::all();
        $stocks= Stock::with('products')->get();

        if(session()->has('saleBill')){
            $invoice_stock = $stocks->where('id',session()->get('saleBill')->stock_id)->first();
            $products = Product::whereIn('id',$invoice_stock->products->pluck('id'))->get();
        }else{
            $products = [];
        }

        $view->with('clients', $clients);
        $view->with('stocks', $stocks);
        $view->with('products', $products);
    }
}
