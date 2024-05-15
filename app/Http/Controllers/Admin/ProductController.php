<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("admin.product_admin.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product_admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'img', 'name', 'description', 'price', 'quantity', 'category_id'
        ]);
        $data['img'] = "../images/" . $request->img;
        $products = Product::create($data);
        $message = "Created new successfully!";
        if (!$products) {
            $message = "Failed to create new!";
        }
        return redirect()->route('admin.products.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view("admin.product_admin.edit", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only([
            'img', 'name', 'description', 'price', 'quantity', 'category_id'
        ]);
        $data['img'] = "../images/" . $request->img;
        $products = Product::create($data);
        $message = "Created new successfully!";
        if (!$products) {
            $message = "Failed to create new!";
        }
        return redirect()->route('admin.products.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // product
        $message = "Successfull deleted";
        if (!Product::destroy($id)) {
            $message = "Delete faiiled";
        }
        return redirect()->route('admin.product.index')->with('message', $message);
    }
}
