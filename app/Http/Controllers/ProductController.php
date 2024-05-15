<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(8); //config pagination
        // dd($products);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // return Product::findOrFail($id)->update($request->all());
        try {
            // return $request->all();
            Product::findOrFail($id)->update($request->all());
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Product::findOrFail($id)->delete();
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('search');
            //    dd($query);
            $productSearch = Product::where('name', 'LIKE', "%$query%")->get();
            return view('products.search', compact('productSearch'));
        } catch (Throwable $th) { //Exception
            return $th;
        }
    }

    public function cart()
    {
        return view('products.cart');
    }
}
