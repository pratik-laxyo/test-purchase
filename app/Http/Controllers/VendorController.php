<?php

namespace App\Http\Controllers;

use App\vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
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
        $vendors = Vendor::latest()->paginate(10);
        return view('vendor.index',compact('vendors'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => '',
            'mobile' => 'required|numeric|unique:vendors',
            'address' => 'required',
            'alt_number' => 'numeric',
            'reg_v_number' => 'required',
            'firm_name' => 'required',
            'gst_number' => 'required|unique:vendors'
        ]);
  
        Vendor::create($request->all());
   
        return redirect()->route('vendor.index')->with('success','Vendor Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(vendor $vendor)
    {
        return view('vendor.show',compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(vendor $vendor)
    {
        return view('vendor.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vendor $vendor)
    {
        $request->validate([
            'name' => 'required',
            'email' => '',
            'mobile' => 'required|numeric',
            'address' => 'required',
            'alt_number' => 'numeric',
            'reg_v_number' => 'required',
            'firm_name' => 'required',
            'gst_number' => 'required'
        ]);
  
        $vendor->update($request->all());
  
        return redirect()->route('vendor.index')->with('success','Vendors details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(vendor $vendor)
    {
        $vendor->delete();
        return redirect()->route('vendor.index')->with('success','Vendors record deleted successfully');
    }
}
