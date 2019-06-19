<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Product;
use App\Photo;

use App\Http\Requests;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        $brands = Brand::lists('name','id')->all();
        $categories = Category::lists('name','id')->all();
        $products=Product::all();
       /* dd($products);*/
        return view('admin.products.index',compact('products','brands','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::lists('name','id')->all();
        $brands = Brand::lists('name','id')->all();
        return view('admin.products.create', compact( 'categories','brands'));

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
        $input=$request->all();// haalt alle velden on van het formulier

        if($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();//samenstelling bestandsnaam
            $file->move('images',$name);//het verplatsen naar de map images
            $photo=Photo::create(['file'=>$name]);//id de tabel fotot ene id aanmaken
            $input['photo_id']=$photo->id;
        }
        Product::create($input);
        /*$product =new Product();
        $product->create($input);*/
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        $categories = Category::lists('name','id')->all();
        $brands = Brand::lists('name','id')->all();
        return view('admin.products.edit', compact('product', 'categories','brands'));

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
        //

        $product=Product::findorfail($id);
        $product->update($request->all());
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products');
    }
}
