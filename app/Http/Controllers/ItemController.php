<?php

namespace App\Http\Controllers;

use App\Department;
use App\Brand;
use App\item;
use App\unitofmeasurement;
use App\item_category;
use App\location;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
  
      $category = item_category::get();     
      $department = Department::get();
      $items =item::with(['brand_name','department_name','category','unit'])->get(); 
      
      return view('item.index',compact('items','category','department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = unitofmeasurement::get();
        $category = item_category::get();
        $location = location::get();
        $brand = Brand::get();
        $department = Department::get();
        return view('item.create',compact('units','category','location','brand', 'department'));
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
            'item_number' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|unique:items',
            'description' => 'required'
        ]);
  
        item::create($request->all());
   
        return redirect()->route('item.index')->with('success','Item Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        $units = unitofmeasurement::get();
        $category = item_category::get();
        $location = location::get();
        $brand = Brand::get();
        $department = Department::get();
        return view('item.show',compact('item','units','category','location','brand','department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        $units = unitofmeasurement::get();
        $category = item_category::get();
        $location = location::get();
        $brand = Brand::get();
        $department = Department::get();
        return view('item.edit',compact('item','units','category','location','brand','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item $item)
    {
        $request->validate([
            'unit_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
  
        $item->update($request->all());
  
        return redirect()->route('item.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        $item->delete();
        return redirect()->route('item.index')->with('success','Item deleted successfully');
    }

    public function filter(Request $request)
    {
      $category = $request->category;
      $dept = $request->department;
      if(!empty($category)){
      	$items =item::with(['brand_name','department_name','category','unit'])->where('category_id', $category)->get(); 
      }
      if(!empty($dept)){
      	$items =item::with(['brand_name','department_name','category','unit'])->where('department', $dept)->get(); 
      }
      if(!empty($dept) && !empty($category)){
      	$items =item::with(['brand_name','department_name','category','unit'])->where('category_id', $category)->where('department', $dept)->get(); 
      }
			return view('item.table',compact('items'));
    }
}
