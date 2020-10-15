<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Stock;
use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Unit;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('admin.basic_information.products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $companies = Company::all();
        $categories = Category::all();
        $units = Unit::all();
        $stocks = Stock::all();
        return view('admin.basic_information.products.form',compact('product','companies','categories','stocks','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $product = Product::create([
            'code' => $request->code,
            'name' =>$request->name,
            'purchase_price' =>$request->purchase_price,
            'sale_price' =>$request->sale_price,
            'category_id' =>$request->category_id,
            'company_id' =>$request->company_id,
            'unit_id' =>$request->unit_id,
        ]);
        if($product){
            $product->stocks()->attach($product->id,[
                'stock_id' => $request->stock_id,
                'first_balance' => ($request->first_balance)??0,
                'end_balance' => ($request->first_balance)??0
            ]);
        }
        return redirect()->route('products.index')
                        ->with('success',trans('general.created_Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.basic_information.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $companies = Company::all();
        $categories = Category::all();
        $stocks = Stock::all();
        return view('admin.basic_information.products.form',compact('product','companies','categories','stocks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request_data = $request->all();
        $product->update($request_data);
        return redirect()->route('products.index')
                        ->with('success',trans('general.created_Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
