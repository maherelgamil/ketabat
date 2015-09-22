<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\Attribute;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::simplePaginate(30);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $attributes = Attribute::get();

        return view('products.create', compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $this->createProduct($request);

        \Flash::success('Your post has been published');

        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Product $product)
    {
        $attributes = $product->attributes;

        $attributes_list = array();

        foreach ($attributes as $attr) {
            $attributes_list[] = $attr->pivot->value;
        }

        return view('products.edit', compact('product', 'attributes', 'attributes_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->updateProduct($request, $product);

        \Flash::success('Your post has been published');

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        \Flash::success('Your product has been Deleted');

        return redirect()->route('admin.products.index');
    }

    /**
     * Save a new product.
     *
     * @param ProductRequest $request
     */
    private function createProduct(ProductRequest $request)
    {
        $product = Product::create($request->all());

        $product->attributes()->sync($this->syncArray($request));
    }

    /**
     * Update a product.
     *
     * @param ProductRequest $request
     */
    private function updateProduct(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        $product->attributes()->sync($this->syncArray($request));
    }

    private function syncArray(ProductRequest $request)
    {
        $attributes_list = $request->input('attributes_list');

        $attributes = array();
        $attributes_index = 0;

        foreach (Attribute::get() as $key => $value) {
            $attributes[$value->id] = array('value' => $attributes_list[$attributes_index]);
            $attributes_index++;
        }

        return $attributes;
    }
}
