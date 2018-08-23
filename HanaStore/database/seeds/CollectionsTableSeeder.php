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
                'images' => 'collection1.jpg'
            ],
            [
                'id'=>2,
                'name'=>'Mùa Hạ',
                'description'=>'Hoa mùa hạ',
                'images' => 'collection2.jpg'
            ],
            [
                'id'=>3,
                'name'=>'Mùa thu',
                'description'=>'Hoa mùa thu',
                'images' => 'collection3.jpg'
            ],
            [
                'id'=>4,
                'name'=>'Mùa Đông',
                'description'=>'Hoa mùa đông',
                'images' => 'collection4.jpg'
            ],
            [
                'id'=>5,
                'name'=>'Phụ nữ Việt Nam 20/10',
                'description'=>'Sắc Hoa',
                'images' => 'collection1.jpg'
            ],
            [
                'id'=>6,
                'name'=>'Hoa Hồng',
                'description'=>'Sắc Hoa',
                'images' => 'collection1.jpg'
            ],
            [
                'id'=>7,
                'name'=>'Hoa Sen',
                'description'=>'Quốc Hoa',
                'images' => 'collection1.jpg'
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
