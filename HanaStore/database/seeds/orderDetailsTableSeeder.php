<?php

use Illuminate\Database\Seeder;
use App\OrderDetails;
class orderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         		for ($i = 0; $i < 10; $i++) {
 			factory(OrderDetails::class)->create();
 		}
    }
}
