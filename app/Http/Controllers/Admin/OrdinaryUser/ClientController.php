<?php

namespace App\Http\Controllers\Admin\OrdinaryUser;

use App\Http\Controllers\Controller;
use App\Models\OrdinaryUser;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = OrdinaryUser::whereType('client')->paginate(25);
        return view('admin.clients.index',['clients'=>$clients])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new OrdinaryUser();
        return view('admin.clients.form',['client'=>$client]);
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
