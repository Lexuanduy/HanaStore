<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'id' => 1,
                'name'=>'Hoa hồng',
                'price'=>40000,
                'categoryId'=>1,
                'collectionId' =>1,
                'images'=>'product1.jpg',
                'description'=>'Hoa hồng đẹp.',
                'sale' => 0,
                'detail' => 'Hoa hồng đẹp lắm đấy.',
            ],
            [
                'id' => 2,
                'name'=>'Hoa hồng đỏ',
                'price'=>40000,
                'categoryId'=>1,
                'collectionId' =>2,
                'images'=>'product2.jpg',
                'description'=>'Hoa hồng đỏ đẹp.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ đẹp lắm đấy.',
            ],
            [
                'id' => 3,
                'name'=>'Hoa hồng đỏ tình yêu',
                'price'=>120000,
                'categoryId'=>1,
                'collectionId' =>3,
                'images'=>'product3.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 4,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>1,
                'collectionId' =>4,
                'images'=>'product4.jpg',
                'description'=>'Lãng hoa hồng.',
                'sale' => 0,
                'detail' => 'Lãng hoa hồng đẹp lắm đấy.',
            ],
            [
                'id' => 5,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>1,
                'collectionId' =>4,
                'images'=>'product5.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 6,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>2,
                'collectionId' =>1,
                'images'=>'product6.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 7,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>2,
                'collectionId' =>2,
                'images'=>'product7.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 8,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=> 2,
                'collectionId' =>3,
                'images'=>'product8.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 9,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>2,
                'collectionId' =>4,
                'images'=>'product9.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 10,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>2,
                'collectionId' =>4,
                'images'=>'product10.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 11,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product11.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 12,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product12.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 13,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product13.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 14,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product14.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 15,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product15.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],

            [
                'id' => 16,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product16.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 17,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product17.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 18,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product18.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 19,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>2,
                'images'=>'product19.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 20,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product20.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],

            [
                'id' => 21,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product21.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 22,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product22.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 23,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product23.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 24,
                'name'=>'Lãng hoa hồng xanh',
                'price'=>150000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product24.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng xanh dương,sâu thẳm và đầy bí ẩn',
            ],
            [
                'id' => 25,
                'name'=>'Lãng hoa hồng tím',
                'price'=>200000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product25.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng tím,sự khác biệt tinh tế',
            ],
            [
                'id' => 26,
                'name'=>'Lãng hoa hồng tím',
                'price'=>200000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product26.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng tím,sự khác biệt tinh tế',
            ],
            [
                'id' => 27,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product27.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 28,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product28.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 29,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product29.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],
            [
                'id' => 30,
                'name'=>'Lãng hoa hồng',
                'price'=>100000,
                'categoryId'=>3,
                'collectionId' =>1,
                'images'=>'product30.jpg',
                'description'=>'Hoa hồng đỏ tình yêu.',
                'sale' => 0,
                'detail' => 'Hoa hồng đỏ tình yêu đẹp lắm đấy.',
            ],          
        ]);
    }
}
