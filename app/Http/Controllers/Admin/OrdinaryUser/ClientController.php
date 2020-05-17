<?php

namespace App\Http\Controllers\Admin\OrdinaryUser;

use App\Models\OrdinaryUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:client-list|client-create|client-edit|client-delete', ['only' => ['index','store']]);
        $this->middleware('permission:client-create', ['only' => ['create','store']]);
        $this->middleware('permission:client-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:client-delete', ['only' => ['destroy']]);
    }
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
    public function store(ClientRequest $request)
    {
        $data = $request->validated();
        OrdinaryUser::create($data);
        return redirect()->route('clients.index')
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
        $client = OrdinaryUser::where('id',$id)->where('type','client')->first();
        return view('admin.clients.show',['client'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = OrdinaryUser::where('id',$id)->where('type','client')->first();
        return view('admin.clients.form',['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $data = $request->validated();
        $client = OrdinaryUser::where('id',$id)->where('type','client')->first();
        $client->update($data);
        return redirect()->route('clients.index')
                        ->with('success',trans('general.updated_Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrdinaryUser  $ordinaryUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdinaryUser $ordinaryUser)
    {
        $client = OrdinaryUser::where('id',$id)->where('type','client')->first();
        $client->delete();
        return redirect()->route('clients.index')
                        ->with('success',trans('general.deleted_Successfully'));
    }
}
