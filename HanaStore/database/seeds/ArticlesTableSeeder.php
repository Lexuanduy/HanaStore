<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->truncate();
        DB::table('articles')->insert([
            [
                'id'=>1,
                'title'=>'Ý nghĩa của hoa hồng trong cuộc sống',
                'description'=>'Hoa hồng được phong tặng danh hiệu là nữ chúa các loài hoa. 
                                Dù được trao tặng cho nhau bất cứ dịp nào, hoa hồng vẫn mang ý nghĩa thân thiện nồng nàn: 
                                từ đóa hồng tặng cho người sản phụ mới sinh con, đến đóa hồng trắng tinh khôi nhẹ nhàng đặt trên quan tài của người vừa nằm xuống. 
                                Người ta tặng hoa hồng để chúc mừng ngày một em bé được sinh ra qua bí tích Thanh tẩy. 
                                Người ta cũng dùng hoa hồng để mừng sinh nhật, mừng kỷ niệm thành hôn. 
                                Đóa hồng đỏ tươi mà chàng thanh niên ngập ngừng tặng cho bạn gái nhằm mục đích thay lời khó nói: I love you ! 
                                Những bông hồng trắng chú rể trao tặng cô dâu trong ngày cưới chính là lời khẳng định 
                                yêu nhau đến cùng.',
                'images' => 'hoa-hong.jpg',
            ],
        ]);
    }
}
