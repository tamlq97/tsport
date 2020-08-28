<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\SubCategoryCollection;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SubCategoryCollection(SubCategory::with(['ancestors', 'descendants', 'parent'])->get());
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
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        if (Gate::denies('edit_subcategory')) return abort(401);
        $validator = $request->validate([
            'name' => 'required',
            'parent_id' => 'required',
            'groupID' => 'required'
        ]);
        $subCategory->update([
            'name' => $validator['name'],
            'category_id' => $validator['parent_id'],
            'parent_id' => $validator['groupID']
        ]);
        return response()->json(['message' => "Successful update item."]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        if (Gate::denies('delete_subcategory')) return abort(401);
        $subCategory->delete();
        return response()->json(['message' => "Successful delete item."]);
    }
}
