<?php

use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('slides')->truncate();
        DB::table('slides')->insert([
            [
                'id'=>1,
                'link'=>'/user/product-sale',
                'images' => 'slide1.jpg'
            ],
            [
                'id'=>2,
                'link'=>'/user/product-new',
                'images' => 'slide2.jpg'
            ],
            [
                'id'=>3,
                'link'=>'/user/product-season',
                'images' => 'slide3.jpg'
            ],
            [
                'id'=>4,
                'link'=>'/user/product-hot',
                'images' => 'slide4.jpg'
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
