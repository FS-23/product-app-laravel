<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = [
        // ];

        // for($i = 0 ; $i< 5 ; $i++){
        //     $product = new Product();
        //     $product -> name ="Nike - ".$i+1;
        //     $product -> description ="Nike test ".$i+1;
        //     $product -> price = ($i+1)*100;
        //     $product -> categorie ="Shoe";
        //     $product -> image ="image - ".$i+1;
          
        //     $products[] = $product;
        // }
        return view('product.list' ,  ["products" => Product::all()]);
    }

  
    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {

        $data = $request -> all();
        
        if( $request ->  hasFile('image-file')){
            $file = $request -> file('image-file');

            $filename = $file -> store("/public/productsImages");

            $filename = str_replace("public" , "storage" , $filename);

            $data['image'] = $filename;
        }


        Product::create($data);

        return redirect('/products/list');
    }
    
    public function show(Product $product)
    {
        return view('product.detail' , ["product" => $product]);
    }

   
    public function edit(Product $product)
    {
        return view('product.edit' , ["product" => $product]);
    }

  
    public function update(Request $request, Product $product)
    {
        
        $data = $request -> all();
        
        if( $request ->  hasFile('image-file')){
            $file = $request -> file('image-file');

            $filename = $file -> store("/public/productsImages");

            $filename = str_replace("public" , "storage" , $filename);

            $data['image'] = $filename;
        }


        $product -> update($data);

        return redirect('/products/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product -> delete();

        return redirect('/products/list');
    }
}
