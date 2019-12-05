<?php

namespace App\Http\Controllers;

use App\Purchase_temperory;
use Illuminate\Http\Request;

class PurchaseTemperoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $temp = Purchase_temperory::latest()->first();
        // return view('purchase.index',compact('temp'));
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
     * @param  \App\Purchase_temperory  $purchase_temperory
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase_temperory $purchase_temperory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase_temperory  $purchase_temperory
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase_temperory $purchase_temperory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase_temperory  $purchase_temperory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase_temperory $purchase_temperory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase_temperory  $purchase_temperory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase_temperory $purchase_temperory)
    {
        //
    }
}
