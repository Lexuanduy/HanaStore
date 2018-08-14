<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->truncate();
        DB::table('orders')->insert([
            [
                'customerId'=>'1',
                'totalPrice'=>'350000',
            ],
            [
                'customerId'=>'2',
                'totalPrice'=>'240000',
            ],
            [
                'customerId'=>'3',
                'totalPrice'=>'300000',
            ],
            [
                'customerId'=>'4',
                'totalPrice'=>'600000',
            ],
            [
                'customerId'=>'5',
                'totalPrice'=>'700000',
            ],
            [
                'customerId'=>'6',
                'totalPrice'=>'400000',
            ],
            [
                'customerId'=>'7',
                'totalPrice'=>'1200000',
            ],
            [
                'customerId'=>'8',
                'totalPrice'=>'300000',
            ],
            [
                'customerId'=>'9',
                'totalPrice'=>'450000',
            ],
            [
                'customerId'=>'10',
                'totalPrice'=>'1350000',
            ],
        ]);
    }
}
