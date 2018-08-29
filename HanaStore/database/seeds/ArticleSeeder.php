<?php
/**
 * Created by PhpStorm.
 * User: Admins
 * Date: 8/29/2018
 * Time: 2:57 PM
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->truncate();
        DB::table('articles')->insert(
        [
            [
                'id' => 1,
                'title' => 'Tiểu sử hoa Mẫu Đơn',
                'content' => 'Tên tiếng Việt : Hoa Mẫu Đơn. Tên Trung Quốc : Sho-Yo (hay Shao-Yao)
                            Tên tiếng Anh : Peony. Tên tiếng Pháp : Pivoine officinale
                            Tên khoa học : Paeonia lactiflora. Họ : Paeoniaceae
                            Chi Mẫu đơn Trung Quốc, 
                            nhiều khi có tài liệu gọi là chi Thược dược (danh pháp khoa học: Paeonia) là chi duy nhất trong họ Mẫu đơn Trung Quốc (Paeoniaceae).',
                'images' => 'https://hoadepviet.com/wp-content/uploads/2016/12/hoa-mau-don-tq-1a.jpg',
            ],
            [
                'id' => 2,
                'title' => 'Làm sao để có chậu hoa Thược Dược đẹp?',
                'content' => 'Thược dược là một trong những loại hoa được chọn trồng khá phổ biến ở nước ta. 
                            Hoa có nhiều giống: giống lùn, giống trung, 
                            giống cao và cũng có nhiều màu sắc khác nhau: vàng lợt, vàng chanh, tím sậm, nâu sậm, tím đốm trắng, đỏ…',
                'images' => 'https://chauhoa.vn/pictures/chau-hoa-thuoc-duoc-3.jpg',
            ],
            [
                'id' => 3,
                'title' => 'Cách giúp hoa tươi lâu hơn mà bạn nên biết',
                'content' => 'Nên đặt bình hoa ở nơi thoát mát, không gian rộng, 
                            không có ánh nắng chiếu, tránh những nơi có nhiệt độ cao, có gió thổi trực tiếp, 
                            tránh xa quạt máy để hoa không bị héo vì mất nước. Ngoài ra, cần tránh những nơi quá nóng như tivi, 
                            tủ lạnh các thiết bị điện khác hoặc ánh nắng mặt trời trực tiếp chiếu vào để hoa không bị héo úa.',
                'images' => 'https://hoatuoi360.com/uploads/2017/01/chonhoangaytet2.jpg',
            ],

        ]);
    }
}