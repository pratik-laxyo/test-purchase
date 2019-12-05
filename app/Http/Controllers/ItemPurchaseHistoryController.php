<?php

namespace App\Http\Controllers;

use App\item_purchase_history;
use App\purchase_invoice;
use App\Purchase;
use Illuminate\Http\Request;

class ItemPurchaseHistoryController extends Controller
{
		public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $purchase = purchase_invoice::all();
      return view('item_purchase_history',compact('purchase'));
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
     * @param  \App\item_purchase_history  $item_purchase_history
     * @return \Illuminate\Http\Response
     */
    public function show(item_purchase_history $item_purchase_history, $id)
    {
    		$invoice = purchase_invoice::where('id', $id)->get();
        return view('unique_invoice',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\item_purchase_history  $item_purchase_history
     * @return \Illuminate\Http\Response
     */
    public function edit(item_purchase_history $item_purchase_history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\item_purchase_history  $item_purchase_history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item_purchase_history $item_purchase_history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\item_purchase_history  $item_purchase_history
     * @return \Illuminate\Http\Response
     */
    public function destroy(item_purchase_history $item_purchase_history)
    {
        //
    }
}
