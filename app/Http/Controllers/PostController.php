<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;

class PostController extends Controller
{
    public function welcome()
    {
        $products = [];
        return view('welcome')->with('products', $products);
    }

    public function store(Request $request)
    {
        //print($request);
        //print_r($myArray);
        $products = unserialize($request->products);
        $validated = $request->validate([
            'category' => 'string',
            'product-name' => 'required|string',
            'price' => 'required',
            'imported' => ''
        ]);

        $products[] = [
            'category' => $request->input('category'),
            'name' => $request->input('product-name'),
            'price' => $request->input('price'),
            'imported' => $request->input('imported') ? true : false
        ];

        //print_r($products);

        return view('welcome', compact('products'));
    }

    public function purchase(Request $request)
    {
        $products = unserialize($request->products);

        print("this is a test");
        print($request);

        [$result, $tot_taxes, $products] = CommonController::calculate($products);

        return view('result')->with('result', $result)->with('tot_taxes', $tot_taxes)->with('products', $products);
    }
}
