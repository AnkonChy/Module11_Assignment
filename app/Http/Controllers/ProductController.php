<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function dashboard()
    {
        $todaySales = $this->getSalesForDate(now());
        $yesterdaySales = $this->getSalesForDate(now()->subDay());
        $thisMonthSales = $this->getSalesForMonth(now());
        $lastMonthSales = $this->getSalesForMonth(now()->subMonth());

        return view('pages.dashboard', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }

    public function getSalesForDate($date)
    {
        return DB::table('sell_details')->whereDate('sold_at', $date)->sum('quantity_sold');
    }

    public function getSalesForMonth($date)
    {
        return DB::table('sell_details')->whereMonth('sold_at', $date->month)->sum('quantity_sold');
    }

    public function index()
    {
        $products = DB::table('products')->get();
        return view('pages.index', compact('products'));
    }



    public function create()
    {
        return view('pages.addProduct');
    }

    public function store(Request $request)
    {
        // Implement logic to store a new product and update quantity
        DB::table('products')->insert([
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
        ]);

        return redirect('/products')->with('success', 'Product added successfully.');
    }



    // public function edit($id)
    // {
    //     $product = DB::table('products')->find($id);
    //     return view('pages.addProduct', compact('product'));
    // }

    public function edit($id)
    {
        $product = DB::table('products')->find($id);

        // Check if the product is found
        if (!$product) {
            abort(404); // Product not found, return a 404 response
        }

        return view('pages.edit', compact('product'));
    }


    // public function update(Request $request, $id)
    // {
    //     // Implement logic to update product price
    //     DB::table('products')->where('id', $id)->update([
    //         'price' => $request->input('price'),
    //     ]);

    //     return redirect('/products')->with('success', 'Product price updated successfully.');
    // }

    // app/Http/Controllers/ProductController.php

    public function update(Request $request, $id)
    {
       
        $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

      
        DB::table('products')->where('id', $id)->update([
            'name' => $request->input('name'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
        ]);

        return redirect('/products')->with('success', 'Product updated successfully.');
    }



}
