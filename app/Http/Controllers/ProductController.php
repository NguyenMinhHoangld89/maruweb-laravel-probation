<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ValidateProductInformation;
use App\Product;
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
        $categories = Category::select('id','name')->get();
        $products = Product::with('category')->paginate($this->numberOfItem);
        return view('admin.product.index', compact(['categories','products']));
    }
    public function getProducts(ValidateProductInformation $request){
        $products = Product::with('category')
            ->where('name','like', '%'.$request['name'].'%')
            ->where('sku','like', '%'.$request['sku'].'%')
            ->orWhere(function ($query) use ($request){
                if($request['category_id']!=0){
                    $query->where('category_id',$request['category_id']);
                }
                if($request['min_price']!='' && $request['max_price']==''){
                    $query->where('price','>=',$request['min_price']);
                }
                if($request['min_price']=='' && $request['max_price']!=''){
                    $query->where('price','<=',$request['max_price']);
                }
                if($request['max_price']!='' && $request['max_price']!='' && $request['max_price'] > $request['min_price']){
                    $query->where('price','>=',$request['min_price']);
                    $query->where('price','<=',$request['max_price']);
                }
            })
            ->orderBy('id','DESC')
            ->paginate($this->numberOfItem);
        return view('admin.product.ajax-get', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id','name')->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateProductInformation $request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        $path = $request->file('image')->store('public/products');
        $data['image'] = $path;
        Product::create($data);
        return redirect('/products');
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
        $categories = Category::select('id','name')->get();
        return view('admin.product.edit', compact(['categories'],'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateProductInformation $request, Product $product)
    {
        $data = $request->all();
        $data['slug'] = str_slug($data['name']);
        $path = $product->image;
        if($request->file('image')!=null){
            $path = $request->file('image')->store('public/products');
        }

        $data['image'] = $path;
        $product->update($data);
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
