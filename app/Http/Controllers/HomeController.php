<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Throwable ;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('home.index', compact('products'));
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
        $productShow = Product::findOrFail($id);
        return view('home.show', compact('productShow'));
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    //search
    public function search(Request $request)
    {
        try {
            // return $request;
            $query = $request->input('search');
            $productSearch = Product::where('name', 'LIKE', "%$query%")->get();
            // $productSearch = ModelsProduct::where('name', 'LIKE', '%$query%')->get(); ko loi nhung ko show dc
            return view('home.search', compact('productSearch'));
        } catch (Throwable $th) {
            return $th;
        }
    }
}