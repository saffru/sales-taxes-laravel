<?php

namespace App\Http\Controllers;

use League\Flysystem\Config;

class CommonController extends Controller
{
    public static function calculate($products)
    {
        $result = 0;
        $tot_taxes = 0;
        $new_products = [];
        foreach ($products as $product) {
            $new_prod_price = 0;
            if ($product['category'] !== 'Book' && $product['category'] !== 'Food' && $product['category'] !== 'Medical prod') {
                $tax = $product['price'] * 0.1;
                $new_prod_price += $product['price'] + ceil(round($tax, 2) * 20) / 20;
                $tot_taxes += ceil(round($tax, 2) * 20) / 20;
            } else {
                $new_prod_price = $product['price'];
            }
            if ($product['imported']) {
                $imported = $product['price'] * 0.05;
                $new_prod_price += ceil(round($imported, 2) * 20) / 20;
                $tot_taxes +=  ceil(round($imported, 2) * 20) / 20;
            }
            $product['price'] = number_format($new_prod_price, 2);
            $result += $new_prod_price;

            $new_products [] = $product;

            //print_r($product);
        }

        return [$result, number_format((round($tot_taxes * 2, 1) / 2), 2), $new_products];
    }
}
