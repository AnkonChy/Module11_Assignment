<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleDetailController extends Controller
{
    public function index()
    {
        $sales = DB::table('sell_details')->get();
        return view('pages.index', compact('sales'));
    }
}
