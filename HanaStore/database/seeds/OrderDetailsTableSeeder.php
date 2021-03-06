<?php

use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \Illuminate\Support\Facades\DB::table('order_details')->truncate();
        \Illuminate\Support\Facades\DB::table('order_details')->insert([
            [
                'orderId'=>'sdg45sdg',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1000000
            ],
            [
                'orderId'=>'de1gs231g',
                'productId'=>3,
                'quantity'=>1,
                'unitPrice'=>1000000
            ],
            [
                'orderId'=>'hgf4hjg54f',
                'productId'=>5,
                'quantity'=>1,
                'unitPrice'=>200000
            ],
            [
                'orderId'=>'sdf7sd4f5',
                'productId'=>6,
                'quantity'=>1,
                'unitPrice'=>1000000
            ],
            [
                'orderId'=>'xcv4167fd4',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1000000
            ],
            [
                'orderId'=>'fjfgh56f4',
                'productId'=>3,
                'quantity'=>1,
                'unitPrice'=>1000000
            ],
            [
                'orderId'=>'7fg87hg',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1000000
            ],
            [
                'orderId'=>'876fg86h',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1000000
            ],
            [
                'orderId'=>'56fgh65gfh',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1300000
            ],
            [
                'orderId'=>'fg74h6f54hg',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>2500000
            ],
            [
                'orderId'=>'4f6g574hf654g',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>4500000
            ],
            [
                'orderId'=>'1d8f67jghjkty84',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1230000
            ],
            [
                'orderId'=>'474gfasfddffd',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1640000
            ],
            [
                'orderId'=>'j756e4rbbv4fg',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1560000
            ],
            [
                'orderId'=>'df4g168wegdfd',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1450000
            ],
            [
                'orderId'=>'54sdf5g48re',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1050000
            ],
            [
                'orderId'=>'qwe7vc1vc2b',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>3000000
            ],
            [
                'orderId'=>'dsf7ewrty5t4',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1040000
            ],
            [
                'orderId'=>'mbv1n2sd28sd',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1070000
            ],
            [
                'orderId'=>'bxcb1d1f2fds',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1000000
            ],
            [
                'orderId'=>'24sda67hnjh87',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>800000
            ],
            [
                'orderId'=>'js67as1bhd7f',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1100000
            ],
            [
                'orderId'=>'32sdfggds654g',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1400000
            ],
            [
                'orderId'=>'7fdgh4e56ds',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1090000
            ],
            [
                'orderId'=>'f7asd4fdfdf',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1050000
            ],
            [
                'orderId'=>'sdf4sd4f',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1006000
            ],
            [
                'orderId'=>'bndf76dfsfds',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>2700000
            ],
            [
                'orderId'=>'dsfdsfdf423',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>1900000
            ],
            [
                'orderId'=>'GHcsfWUhfshv5CQx',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>890000
            ],
            [
                'orderId'=>'76shk4PXDp9cZTQP',
                'productId'=>2,
                'quantity'=>1,
                'unitPrice'=>790000
            ],
        ]);
    }
}
