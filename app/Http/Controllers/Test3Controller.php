<?php

namespace App\Http\Controllers;


class Test3Controller extends Controller
{
    public function runTest()
    {
        $products[] = [
            'category' => 'Other',
            'name' => 'bottle of perfumee',
            'price' => 27.99,
            'imported' => true
        ];
        $products[] = [
            'category' => 'Other',
            'name' => 'bottle of perfumee',
            'price' => 18.99,
            'imported' => false
        ];
        $products[] = [
            'category' => 'Medical prod',
            'name' => 'packet of headache pills',
            'price' => 9.75,
            'imported' => false
        ];
        $products[] = [
            'category' => 'Food',
            'name' => 'box of chocolate',
            'price' => 11.25,
            'imported' => true
        ];
        $products[] = [
            'category' => 'Food',
            'name' => 'box of chocolate',
            'price' => 11.25,
            'imported' => true
        ];
        $products[] = [
            'category' => 'Food',
            'name' => 'box of chocolate',
            'price' => 11.25,
            'imported' => true
        ];

        [$tot_price, $tot_taxes, $products] = CommonController::calculate($products);

        return view('result')->with('result', $tot_price)->with('tot_taxes', $tot_taxes)->with('products', $products);
    }
}
