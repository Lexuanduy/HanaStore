<?php

use Illuminate\Database\Seeder;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('collections')->truncate();
        DB::table('collections')->insert([
            [
                'id'=>1,
                'name'=>'Mùa xuân',
                'description'=>'Hoa mùa xuân',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334671/1535334665.jpg'
            ],
            [
                'id'=>2,
                'name'=>'Mùa Hạ',
                'description'=>'Hoa mùa hạ',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334691/1535334687.jpg'
            ],
            [
                'id'=>3,
                'name'=>'Mùa thu',
                'description'=>'Hoa mùa thu',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334737/1535334730.jpg'
            ],
            [
                'id'=>4,
                'name'=>'Mùa Đông',
                'description'=>'Hoa mùa đông',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334775/1535334752.jpg'
            ],
            [
                'id'=>5,
                'name'=>'Phụ nữ Việt Nam 20/10',
                'description'=>'Sắc Hoa',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334801/1535334797.jpg'
            ],
            [
                'id'=>6,
                'name'=>'Hoa Hồng',
                'description'=>'Sắc Hoa',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334937/1535334909.jpg'
            ],
            [
                'id'=>7,
                'name'=>'Hoa Sen',
                'description'=>'Quốc Hoa',
                'images'=>'http://res.cloudinary.com/dug9zryzq/image/upload/v1535334996/1535334995.jpg'
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
