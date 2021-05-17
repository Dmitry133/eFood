<?php

namespace App\Http\Controllers;

use App\Foodpackage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class foodpackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_admin = 0;
        $foodpackages = Foodpackage::all();
        if (Auth::check())
        {
            $user_id=Auth::id();
            $is_admin=User::find($user_id)->is_admin;

        }
        return view('foodpackage.index',['foodpackages'=>$foodpackages,'is_admin'=>$is_admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $foodpackage = new Foodpackage;
        return view('foodpackage.create',['foodpackage'=>$foodpackage]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foodpackage = new Foodpackage;
        $foodpackage->name = $request->foodpackagenameform;
        $foodpackage->barcode = $request->foodpackagebarcodeform;
        $foodpackage->description = $request->foodpackagedescriptionform;

        $fname = $request->file('foodpackageimagepathform');

        if($fname) {
            $original_name = $fname->getClientOriginalName();
            $fname->move(public_path().'/images', $original_name);
            $foodpackage->imagepath = '/images/' . $original_name;
        }

        $foodpackage->price = $request->foodpackagepriceform;
        $foodpackage->kCal = $request->foodpackagekcalform;
        $foodpackage->protein = $request->foodpackageproteinform;
        $foodpackage->fats = $request->foodpackagefatsform;
        $foodpackage->carbohydrates = $request->foodpackagecarbohydratesform;

        if(!$foodpackage->save()){
            $err = $foodpackage->getErrors();
            return redirect()->action('FoodpackageController@create')->with('errors',$err)->withInput();
        }
        return redirect()->action('FoodpackageController@create')->with('message',"New foodpackage $foodpackage->name has been added with id $foodpackage->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $foodpackages= Foodpackage::all();
//        $is_admin=0;
//        if (Auth::check())
//        {
//            $user_id=Auth::id();
//            $is_admin=User::find($user_id)->is_admin;
//
//        }
//
//        return view('foodpackage.index',['foodpackages'=>$foodpackages,'is_admin'=>$is_admin]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodpackage = Foodpackage::find($id);
        return view('foodpackage.edit',['foodpackage'=>$foodpackage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foodpackage = Foodpackage::find($id);
        $foodpackage->name = $request->name;
        $foodpackage->barcode = $request->barcode;
        $foodpackage->description = $request->description;
        $foodpackage->price = $request->price;
        $foodpackage->kCal = $request->kCal;
        $foodpackage->protein = $request->protein;
        $foodpackage->fats = $request->fats;
        $foodpackage->carbohydrates = $request->carbohydrates;

        $fname = $request->file('imagepath');

        if($fname) {
            $original_name = $request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->move(public_path().'/images',$original_name);
            $foodpackage->imagepath = '/images/'.$original_name;
        }

        if(!$foodpackage->save()){
            $err = $foodpackage->getErrors();
            return redirect("foodpackage/$id/edit")->with('errors',$err)->withInput();
        }
        return redirect("foodpackage");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foodpackage = Foodpackage::find($id);
        $foodpackage->delete();
        return redirect('foodpackage');
    }

    public function search(Request $request) {
        $search = $request->searchform;
        $search = '%'.$search.'%';
        $foodpackages = Foodpackage::where('name','like', $search)->get();
        return view('foodpackage.index',['foodpackages'=>$foodpackages,'id'=>0]);
    }
}
