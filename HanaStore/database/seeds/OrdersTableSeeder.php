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
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \Illuminate\Support\Facades\DB::table('orders')->truncate();
        \Illuminate\Support\Facades\DB::table('orders')->insert([
            [
                'customerId'=>1,
                'totalPrice'=>1000000,
                'shipName'=>'Donald Trump',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 20, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 20, 12, 20, 20),
            ],

            [
                'customerId'=>2,
                'totalPrice'=>1000000,
                'shipName'=>'Barack Obama',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 21, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 21, 12, 20, 20),
            ],

            [
                'customerId'=>3,
                'totalPrice'=>1000000,
                'shipName'=>'Donald Obama',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 22, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 22, 12, 20, 20),
            ],

            [
                'customerId'=>4,
                'totalPrice'=>1000000,
                'shipName'=>'Barack Trump',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 23, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 23, 12, 20, 20),
            ],

            [
                'customerId'=>5,
                'totalPrice'=>1000000,
                'shipName'=>'Đỗ Nam Trung',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 24, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 24, 12, 20, 20),
            ],

            [
                'customerId'=>6,
                'totalPrice'=>1000000,
                'shipName'=>'Hoa Thịnh Đốn',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 25, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 25, 12, 20, 20),
            ],

            [
                'customerId'=>7,
                'totalPrice'=>1000000,
                'shipName'=>'Nã Phá Luân',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 20, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 20, 12, 20, 20),
            ],

            [
                'customerId'=>8,
                'totalPrice'=>1000000,
                'shipName'=>'Napoleon',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 21, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 21, 12, 20, 20),
            ],

            [
                'customerId'=>9,
                'totalPrice'=>1300000,
                'shipName'=>'Donald Nam',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 22, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 22, 12, 20, 20),
            ],

            [
                'customerId'=>10,
                'totalPrice'=>2500000,
                'shipName'=>'Donald Việt',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 23, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 23, 12, 20, 20),
            ],

            [
                'customerId'=>11,
                'totalPrice'=>4500000,
                'shipName'=>'Donald Phước',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 24, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 24, 12, 20, 20),
            ],

            [
                'customerId'=>12,
                'totalPrice'=>1230000,
                'shipName'=>'Donald Duy',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 25, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 25, 12, 20, 20),
            ],

            [
                'customerId'=>13,
                'totalPrice'=>1640000,
                'shipName'=>'Donald Trump',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 20, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 20, 12, 20, 20),
            ],

            [
                'customerId'=>14,
                'totalPrice'=>1560000,
                'shipName'=>'Washington Trump',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 21, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 21, 12, 20, 20),
            ],

            [
                'customerId'=>15,
                'totalPrice'=>1450000,
                'shipName'=>'Napoleon Trump',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 22, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 22, 12, 20, 20),
            ],

            [
                'customerId'=>16,
                'totalPrice'=>1050000,
                'shipName'=>'Donald Hill',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 23, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 23, 12, 20, 20),
            ],

            [
                'customerId'=>17,
                'totalPrice'=>3000000,
                'shipName'=>'Barack Napoleon',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 24, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 24, 12, 20, 20),
            ],

            [
                'customerId'=>18,
                'totalPrice'=>1040000,
                'shipName'=>'Donald Washington',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 25, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 25, 12, 20, 20),
            ],

            [
                'customerId'=>19,
                'totalPrice'=>1070000,
                'shipName'=>'Donald Napoleon',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 20, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 20, 12, 20, 20),
            ],

            [
                'customerId'=>20,
                'totalPrice'=>1000000,
                'shipName'=>'Đậu Nam Bắc',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 21, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 21, 12, 20, 20),
            ],

            [
                'customerId'=>21,
                'totalPrice'=>800000,
                'shipName'=>'Đậu Nam Trump',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 22, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 22, 12, 20, 20),
            ],

            [
                'customerId'=>22,
                'totalPrice'=>1100000,
                'shipName'=>'Barack Nam',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 23, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 23, 12, 20, 20),
            ],

            [
                'customerId'=>23,
                'totalPrice'=>1400000,
                'shipName'=>'Barack Bắc',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 24, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 24, 12, 20, 20),
            ],

            [
                'customerId'=>24,
                'totalPrice'=>1090000,
                'shipName'=>'Barack Trung',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 25, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 25, 12, 20, 20),
            ],

            [
                'customerId'=>25,
                'totalPrice'=>1050000,
                'shipName'=>'Đỗ Trump',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 20, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 20, 12, 20, 20),
            ],

            [
                'customerId'=>26,
                'totalPrice'=>1006000,
                'shipName'=>'Đỗ Bắc Trump',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 21, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 21, 12, 20, 20),
            ],

            [
                'customerId'=>27,
                'totalPrice'=>2700000,
                'shipName'=>'Donald Bắc',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 22, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 22, 12, 20, 20),
            ],

            [
                'customerId'=>28,
                'totalPrice'=>1900000,
                'shipName'=>'Đỗ Nam Trump',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 23, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 23, 12, 20, 20),
            ],

            [
                'customerId'=>29,
                'totalPrice'=>890000,
                'shipName'=>'Donald Trung',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 24, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 24, 12, 20, 20),
            ],

            [
                'customerId'=>30,
                'totalPrice'=>790000,
                'shipName'=>'Washington',
                'shipPhone'=>'19000091',
                'shipAddress'=>'Cầu Giấy',
                'note' => 'Hoa phải tươi nha bạn bán hoa, héo là trả lại đó',
                'created_at'=>\Carbon\Carbon::create(2018, 8, 25, 6, 20, 20),
                'updated_at'=>\Carbon\Carbon::create(2018, 8, 25, 12, 20, 20),
            ],
        ]);
    }
}
