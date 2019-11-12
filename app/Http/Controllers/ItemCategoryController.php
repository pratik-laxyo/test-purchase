<?php

namespace App\Http\Controllers;

use App\item_category;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
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
        $category = item_category::latest()->paginate(10);
        return view('category',compact('category'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        $data = new item_category;
        $data->category_name = $request->input('category_name');
        $data->save ();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function show(item_category $item_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function edit(item_category $item_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, item_category $item_category)
    {
        item_category::where('id', $request->input('id'))->update(['category_name'=> $request->input('category_name')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\item_category  $item_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        item_category::find($id)->delete();
        return redirect()->route('category.index')->with('success','Category deleted successfully');
    }
}
