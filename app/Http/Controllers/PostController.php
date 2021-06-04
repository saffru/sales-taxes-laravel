<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CommonController;

class PostController extends Controller
{
    public function welcome()
    {
        $myArray = [];
        return view('welcome')->with('myArray', $myArray);
    }

    public function store(Request $request)
    {
        print($request);
        //print_r($myArray);
        $myArray = unserialize($request->products);
        $validated = $request->validate([
            'category' => 'string',
            'product-name' => 'required|string',
            'price' => 'required',
            'imported' => ''
        ]);

        $myArray[] = [
            'category' => $request->input('category'),
            'name' => $request->input('product-name'),
            'price' => $request->input('price'),
            'imported' => $request->input('imported') ? true : false
        ];

        print_r($myArray);

        return view('welcome', compact('myArray'));
    }

    public function purchase(Request $request)
    {

        [$result, $tot_taxes, $products] = CommonController::calculate(unserialize($request->products));

        return view('result')->with('result', $result)->with('tot_taxes', $tot_taxes)->with('products', $products);
    }
}
