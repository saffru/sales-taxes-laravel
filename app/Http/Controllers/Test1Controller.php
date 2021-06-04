<?php

namespace App\Http\Controllers;


class Test1Controller extends Controller
{
    public function runTest()
    {
        $products[] = [
            'category' => 'Book',
            'name' => 'Slav of Hope',
            'price' => 12.49,
            'imported' => false
        ];
        $products[] = [
            'category' => 'Book',
            'name' => 'Losing The King',
            'price' => 12.49,
            'imported' => false
        ];
        $products[] = [
            'category' => 'Other',
            'name' => 'music CD',
            'price' => 14.99,
            'imported' => false
        ];
        $products[] = [
            'category' => 'Food',
            'name' => 'chocolate bar',
            'price' => 0.85,
            'imported' => false
        ];

        [$tot_price, $tot_taxes, $products] = CommonController::calculate($products);

        return view('result')->with('result', $tot_price)->with('tot_taxes', $tot_taxes)->with('products', $products);
    }
}
