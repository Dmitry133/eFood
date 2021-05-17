<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $is_admin = 0;
        $products = Product::all();
        if (Auth::check())
        {
            $user_id=Auth::id();
            $is_admin=User::find($user_id)->is_admin;

        }
        return view('product.index',['products'=>$products,'is_admin'=>$is_admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        return view('product.create',['product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->productnameform;
        $product->barcode = $request->productbarcodeform;
        $product->description = $request->productdescriptionform;

        $fname = $request->file('productimagepathform');

        if($fname) {
            $original_name = $fname->getClientOriginalName();
            $fname->move(public_path().'/images', $original_name);
            $product->imagepath = '/images/' . $original_name;
        }

        $product->price = $request->productpriceform;
        $product->kCal = $request->productkcalform;
        $product->protein = $request->productproteinform;
        $product->fats = $request->productfatsform;
        $product->carbohydrates = $request->productcarbohydratesform;

        if(!$product->save()){
            $err = $product->getErrors();
            return redirect()->action('ProductController@create')->with('errors',$err)->withInput();
        }
        return redirect()->action('ProductController@create')->with('message',"New product $product->name has been added with id $product->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $products= Product::all();
//        $is_admin=0;
//        if (Auth::check())
//        {
//            $user_id=Auth::id();
//            $is_admin=User::find($user_id)->is_admin;
//
//        }
//        return view('product.index',['products'=>$products,'id'=>$id,'is_admin'=>$is_admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit',['product'=>$product]);
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
        $product = Product::find($id);
        $product->name = $request->name;
        $product->barcode = $request->barcode;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->kCal = $request->kCal;
        $product->protein = $request->protein;
        $product->fats = $request->fats;
        $product->carbohydrates = $request->carbohydrates;

        $fname = $request->file('imagepath');

        if($fname) {
            $original_name = $request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->move(public_path().'/images',$original_name);
            $product->imagepath = '/images/'.$original_name;
        }

            if(!$product->save()){
                $err = $product->getErrors();
                return redirect("product/$id/edit")->with('errors',$err)->withInput();
            }
        return redirect("product");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('product');
    }

    public function search(Request $request) {
        $search = $request->searchform;
        $search = '%'.$search.'%';
        $products = Product::where('name','like', $search)->get();
        return view('product.index',['products'=>$products,'id'=>0]);
    }
}
