<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\Transaction;
use Validator;
use session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Wallet::get();
        return view('admin.wallet',[
            "wallets" => $wallets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wallet-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route("wallet.index")->with('danger', $validator->errors()->first());
        }
        $wallet = Wallet::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        if($wallet){
            return redirect()->route("wallet.index")->with('status', "Sukses menambahkan wallet");
        }else{
            return redirect()->route("wallet.index")->with('danger', "Terjadi Kesalahan saat menambahkan wallet.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        // dd($wallet->transactions);
        $transactions = $wallet->transactions;
        return view('admin.wallet-show',[
            "wallet" => $wallet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wallet = Wallet::findOrFail($id);
        // dd($category);
        return view('admin.wallet-edit',[
            'wallet' => $wallet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->name);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        
        if ($validator->fails()) {
            return redirect()->route("wallet.index")->with('danger', $validator->errors()->first());
        }
        $wallet = Wallet::findOrFail($id);
        $wallet->name = $request->name;
        $wallet->description = $request->description;
        
        if($wallet->save()){
            return redirect()->route("wallet.index")->with('status', "Sukses merubah wallet");
        }else {
            return redirect()->route("wallet.index")->with('danger', "Terjadi Kesalahan");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Wallet::destroy($id)){
            return redirect()->route("wallet.index")->with('status', "Sukses menghapus wallet");
        }else {
            return redirect()->route("wallet.index")->with('danger', "Terjadi Kesalahan");
        }
    }
}
