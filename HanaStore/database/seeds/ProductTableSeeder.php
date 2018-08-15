<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\ProductModel;


class ProductTableSeeder extends Seeder
{
    public function run()
    {
 		for ($i = 0; $i < 30; $i++) {
 			factory(ProductModel::class)->create();
 		}
    }
}
