<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if (request('f_count')) {
            $formcount = request('f_count');
            if($formcount>50){
                print_r('Max Number of Form Should be Less Than 50');
            }
            else{
                return view('products.index',['form_count'=>$formcount]);
            }
        } else {
            $formcount = 2;
            return view('products.index',['form_count'=>$formcount]);
            
        }
       

        
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
        
        $data=$request->all();
        
       foreach($request->title as $items=>$v){  
            $imageName = time().'.'.$request->photo[$items]->extension();  
            $request->photo[$items]->move(public_path('test'), $imageName);      
            $data2=array(
                'title'=> $request->title[$items],
                'description'=> $request->description[$items],
                'price'=> $request->price[$items],
                'total_quantity'=> $request->total_quantity[$items],
                'photo'=> public_path('test\\').$imageName,
             );
             Product::insert($data2);
        }
        $student = Product::all();        
        return view('products.view',compact('student'));
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
