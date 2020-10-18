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
        $clients = ClientAccount::with(['client','saleBill'])->paginate(25);
        dd($clients);
        return view('admin.clients.account.index',['clients'=>$clients])->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
