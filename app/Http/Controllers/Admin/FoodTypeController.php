<?php

namespace App\Http\Controllers\Admin;


use App\FoodType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $food_types = FoodType::orderBy('id','DESC')->get();
        return view('admin.food_type.create',compact('food_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FoodType $foodType)
    {
        $this->validate($request,[
            'name' => 'required | unique:food_types',
        ]);
//        $foodType = new FoodType();

        $foodType->name = $request->name;
        $foodType->save();

        Toastr::success('Successfully Created !' ,'Food Type');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FoodType  $foodType
     * @return \Illuminate\Http\Response
     */
    public function show(FoodType $foodType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FoodType  $foodType
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodType $foodType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FoodType  $foodType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoodType $foodType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FoodType  $foodType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food_type = FoodType::find($id);
        $food_type->delete();

        Toastr::success('Successfully Deleted !' ,'Food Type');
        return redirect()->back();
    }
}
