<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Attribute;
use App\Http\Requests\AttributeRequest;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $attributes = Attribute::all();

        return view('attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AttributeRequest $request)
    {
        Attribute::create($request->all());

        // Success message
        \Flash::success('New Attribute added.');

        return redirect('admin/attributes');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Attribute $attribute)
    {
        $products = $product->attributes()->get();

        return view('attributes.show', compact('products', 'attribute'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Attribute $attribute)
    {
        return view('attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $attribute->update($request->all());

        \Flash::success('Your attribute has been Updated');

        return redirect('admin/attributes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        \Flash::success('Your attribute has been Deleted');

        return redirect('admin/attributes');
    }
}
