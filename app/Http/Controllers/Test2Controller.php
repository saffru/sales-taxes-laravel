<?php

namespace App\Http\Controllers;


class Test2Controller extends Controller
{
    public function runTest()
    {
        $products[] = [
            'category' => 'Food',
            'name' => 'box of chocolates',
            'price' => 10.00,
            'imported' => true
        ];
        $products[] = [
            'category' => 'Other',
            'name' => 'bottle of permfume',
            'price' => 47.50,
            'imported' => true
        ];

        [$tot_price, $tot_taxes, $products] = CommonController::calculate($products);

        return view('result')->with('result', $tot_price)->with('tot_taxes', $tot_taxes)->with('products', $products);
    }
}
