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
                'name'=>'Hoa giỏ',
                'images'=>'https://tuongvyflorist.com/wp-content/uploads/2018/01/HG-0012-6-150x150.jpg',
                'description'=>'Hoa được dùng để trang trí, trưng bày...'
            ],
            [
                'id'=>2,
                'name'=>'Hoa bó',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334484/1535334477.jpg',
                'description'=>'Hoa được dùng để gửi tặng người thân...'
            ],
            [
                'id'=>3,
                'name'=>'Hoa nhập khẩu',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334500/1535334495.jpg',
                'description'=>'Hoa được nhập khẩu từ các quốc gia trên thế giới...'
            ],
            [
                'id'=>4,
                'name'=>'Hoa cưới',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334520/1535334514.jpg',
                'description'=>'Hoa được làm trang trí đám cưới, bày bàn, hoa đón dâu'
            ],
            [
                'id'=>5,
                'name'=>'Hoa chúc mừng',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334556/1535334549.jpg',
                'description'=>'Hoa dùng để tặng, chúc mừng'
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
