<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();
        return view('products.products',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['category'] = Category::arrForCategory();
        $this->data['mode']     = 'create';
        return view('products.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = $request->all();
        if (Product::create($product)) {
            Session::flash('message', 'Added product Successfully');
        }

        return redirect()->to('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product']      = Product::findOrFail($id);
        $this->data['category']     = Category::arrForCategory();

        return view('products.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product']      = Product::findOrFail($id);
        $this->data['category']     = Category::arrForCategory();
        $this->data['mode']         = 'edit';

        return view('products.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, $id)
    {
        $product        = $request -> all();
        $updataProduct  = Product::findOrFail($id);

        $updataProduct -> category_id   = $product['category_id'];
        $updataProduct -> title         = $product['title'];
        $updataProduct -> description   = $product['description'];
        $updataProduct -> cost_price    = $product['cost_price'];
        $updataProduct -> price         = $product['price'];

        if ($updataProduct->save()) {
            Session::flash('message', 'Product Update Successfully');
        }

        return redirect()->to('products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            Session::flash('message', 'Product Delete Successfully');
        }

        return redirect()->back();
    }
}
