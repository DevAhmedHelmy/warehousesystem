<?php

namespace App\Http\Controllers\Admin\OrdinaryUser;

use App\Http\Controllers\Controller;
use App\Models\OrdinaryUser;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suppliers = OrdinaryUser::whereType('suplier')->paginate(25);
        return view('admin.suppliers.index',['suppliers'=>$suppliers])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function show(OrdinaryUser $ordinaryUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdinaryUser $ordinaryUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdinaryUser $ordinaryUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdinaryUser $ordinaryUser)
    {
        //
    }
}
