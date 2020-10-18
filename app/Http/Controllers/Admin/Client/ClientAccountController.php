<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientAccount;
class ClientAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $accounts = ClientAccount::with(['accounts'])->paginate(25);
 
        return view('admin.clients.account.index',['accounts'=>$accounts])->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function show(ClientAccount $clients_account)
    {
        $clients_account =$clients_account->load(['accounts','accounts.saleBill']);
        dd($clients_account);
        return view('admin.clients.account.show',['clients_account'=>$clients_account]);
    }
}
