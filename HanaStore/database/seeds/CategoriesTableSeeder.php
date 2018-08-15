<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'id'=>1,
                'name'=>'Hoa sinh nhật',
                'description'=>'Hoa được dùng để tặng trong tiệc sinh nhật'
            ],
            [
                'id'=>2,
                'name'=>'Hoa khai trương',
                'description'=>'Hoa được dùng để trang trí rong dịp khai trương'
            ],
            [
                'id'=>3,
                'name'=>'Hoa giỏ',
                'description'=>'Hoa được làm và trang trí thành từng giỏ để tặng hoặc trưng bày'
            ],
            [
                'id'=>4,
                'name'=>'Hoa nhập khẩu',
                'description'=>'Hoa được nhập khẩu từ các quốc gia trên thế giới'
            ],
            [
                'id'=>5,
                'name'=>'Hoa bó',
                'description'=>'Hoa được làm theo bó'
            ],
            [
                'id'=>6,
                'name'=>'Hoa cưới',
                'description'=>'Hoa được làm trang trí đám cưới, bày bàn, hoa đón dâu'
            ],
            [
                'id'=>7,
                'name'=>'Hoa chúc mừng',
                'description'=>'Hoa dùng để tặng, chúc mừng'
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
