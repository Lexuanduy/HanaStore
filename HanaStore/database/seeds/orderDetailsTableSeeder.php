<?php

use Illuminate\Database\Seeder;
use App\OrderDetails;
use Illuminate\support\Facades\DB;
class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('order_details')->insert([
            [
                'orderId'=>1,
                'productId' => 1,
                'quantity' => 1,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],

            [
                'orderId'=>2,
                'productId' => 2,
                'quantity' => 2,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],

            [
                'orderId'=>3,
                'productId' => 3,
                'quantity' => 3,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],

            [
                'orderId'=>4,
                'productId' => 4,
                'quantity' => 4,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],

            [
                'orderId'=>5,
                'productId' => 5,
                'quantity' => 5,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],

            [
                'orderId'=>6,
                'productId' => 6,
                'quantity' => 6,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],

            [
                'orderId'=>7,
                'productId' => 7,
                'quantity' => 7,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],

            [
                'orderId'=>8,
                'productId' => 8,
                'quantity' => 8,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],

            [
                'orderId'=>9,
                'productId' => 9,
                'quantity' => 9,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],

            [
                'orderId'=>10,
                'productId' => 10,
                'quantity' => 10,
                'unitPrice' => 100000,
                'address' => '14th WallStreet',
            ],            

    	])
    }
}
