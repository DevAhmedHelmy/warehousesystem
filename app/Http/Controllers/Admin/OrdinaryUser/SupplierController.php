<?php

namespace App\Http\Controllers\Admin\OrdinaryUser;

use App\Models\Company;
use App\Models\OrdinaryUser;
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
        $suppliers = OrdinaryUser::whereType('supplier')->paginate(25);

        return view('admin.suppliers.index',['suppliers'=>$suppliers])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = new OrdinaryUser();
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
        OrdinaryUser::create($data);
        return redirect()->route('suppliers.index')
                        ->with('success',trans('general.created_Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = OrdinaryUser::where('id',$id)->where('type','supplier')->first();
        return view('admin.suppliers.show',['supplier'=>$supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = OrdinaryUser::where('id',$id)->where('type','supplier')->first();
        $companies = Company::all();
        return view('admin.suppliers.form',['supplier'=>$supplier,'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function update(SuplierRequest $request, $id)
    {
        $data = $request->validated();
        $supplier = OrdinaryUser::where('id',$id)->where('type','supplier')->first();
        $supplier->update($data);
        return redirect()->route('suppliers.index')
                        ->with('success',trans('general.updated_Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = OrdinaryUser::where('id',$id)->where('type','supplier')->first();
        $supplier->delete();
        return redirect()->route('suppliers.index')
                        ->with('success',trans('general.deleted_Successfully'));
    }
}
