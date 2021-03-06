<?php

namespace App\Http\Controllers\Admin\Supplier;

use App\Models\Company;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SuplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:supplier-list|supplier-create|supplier-edit|supplier-delete', ['only' => ['index','store']]);
        $this->middleware('permission:supplier-create', ['only' => ['create','store']]);
        $this->middleware('permission:supplier-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:supplier-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::paginate(25);

        return view('admin.suppliers.index',['suppliers'=>$suppliers])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = new Supplier();
        $companies = Company::all();

        return view('admin.suppliers.form',['supplier'=>$supplier,'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuplierRequest $request)
    {

        $data = $request->validated();
        Supplier::create($data);
        return redirect()->route('suppliers.index')
                        ->with('success',trans('general.created_Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $supplier =  $supplier->load('purchasesBills'); 
        return view('admin.suppliers.show',['supplier'=>$supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    { 
        $companies = Company::all();
        return view('admin.suppliers.form',['supplier'=>$supplier,'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function update(SuplierRequest $request, Supplier $supplier)
    {
        $data = $request->validated();
       
        $supplier->update($data);
        return redirect()->route('suppliers.index')
                        ->with('success',trans('general.updated_Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete(); 
        return redirect()->route('suppliers.index')
                        ->with('success',trans('general.deleted_Successfully'));
    }
}
