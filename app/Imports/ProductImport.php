<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        return new Product([
            'product_name' => $row[0],
            'video' => $row[1],
            'stock' => $row[2],
            'price' => $row[3],
            'shop_id' => $row[4],
        ]);

    }
}
