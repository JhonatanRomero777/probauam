<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Category;
use App\Http\Requests\RestaurantRequest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::orderBy('name','asc')->get();
        return view('restaurants.index' , compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $restaurant = new Restaurant;
        return view('restaurants.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->phone = $request->phone;
        $restaurant->score = $request->score;
        $restaurant->isVacunado = $request->isVacunado;
        $restaurant->category_id = $request->category_id;

        $restaurant->save();
        return redirect()->route('restaurants.show',$restaurant->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);
        return view('restaurants.show' , compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        $categories = Category::all();
        return view('restaurants.edit' , compact('restaurant','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request,$id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->name;
        $restaurant->phone = $request->phone;
        $restaurant->score = $request->score;
        $restaurant->isVacunado = $request->isVacunado;
        $restaurant->category_id = $request->category_id;

        $restaurant->save();
        return redirect()->route('restaurants.show',$restaurant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect()->route('restaurants.index');
    }
}