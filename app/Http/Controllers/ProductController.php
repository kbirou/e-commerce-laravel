<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Admin panel

    // display products table
    public function index(){
        $products=Product::with('category','colors')->orderBy('created_at','desc')->get();
        // return $products;
        return view('admin.pages.products.index',['products'=>$products]);
    }

    // create products table
    public function create(){
        $categories=Category::all();
        $colors=Color::all();
        return view('admin.pages.products.create',['categories'=>$categories,'colors'=>$colors]);
    }

    // store ,, Sauvegarder
    public function store(Request $request){
        // validate
        $request->validate([
            'title'=>'required|max:255',
            'category_id'=>'required',
            'colors'=>'required',
            'price'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // image store
        $image_name = 'products/' . time() . rand(0, 9999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public',$image_name);
        // image store
        $product = Product::create([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'price'=>$request->price*100,
            'description'=>$request->description,
            'image'=>$image_name
        ]);      
        $product->colors()->attach($request->colors);

        // return
        return back()->with('success','Product Saved');
    }

    // edit products table
    public function edit($id){
        $product=Product::findOrFail($id);
        $categories=Category::all();
        $colors=Color::all();
        return view('admin.pages.products.edit',['categories'=>$categories,'colors'=>$colors,'product'=>$product]);
    }

    // update products table
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required|max:255',
            'category_id'=>'required',
            'colors'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // image store
        $image_name = $product->image;
        if($request->image){
          $image_name = 'products/' . time() . rand(0, 9999) . '.' . $request->image->getClientOriginalExtension();
        $request->image->storeAs('public',$image_name);  
        }
        // image store
        $product->update([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'price'=>$request->price*100,
            'description'=>$request->description,
            'image'=>$image_name
        ]);      
        $product->colors()->sync($request->colors);

        // return
        return back()->with('success','Product Updeted');
    }

    // delete products table
    public function destroy($id){
        Product::findOrFail($id)->delete();
        return back()->with('success','Product Deleted');
    }
}
