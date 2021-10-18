<?php



use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customers')->delete();
        
        \DB::table('customers')->insert(array (
            0 => 
            array (
                'id' => 31,
                'makh' => '9Fffda0',
                'contact_fname' => 'la',
                'contact_lname' => 'quyet tam',
                'address' => 'Tổ 4 - Thôn Đồng Thanh - Xã Hoành Mô - Huyện Bình Liêu - Tỉnh Quảng Ninh - VietNam',
                'city' => 'Bình Liêu',
                'country' => 'Vietnam',
                'phone' => '+84962743002',
                'email' => 'laquyettam1995@gmail.com',
                'user_id' => 136,
                'avatar' => 'http://localhost:8000/storage/customers/31/image/search.png',
                'created_at' => '2020-05-31 09:54:54',
                'updated_at' => '2020-06-02 21:38:22',
            ),
            1 => 
            array (
                'id' => 37,
                'makh' => 'B65b93c',
                'contact_fname' => 'send',
                'contact_lname' => 'laravel',
                'address' => 'Tổ 4 - Thôn Đồng Thanh - Xã Hoành Mô - Huyện Bình Liêu - Tỉnh Quảng Ninh - VietNam',
                'city' => 'Bình Liêu',
                'country' => 'Vietnam',
                'phone' => '+84962743002',
                'email' => 'laquyettam1995@gmail.com',
                'user_id' => 135,
                'avatar' => 'http://localhost:8000/storage/customers/37/image/create-user.png',
                'created_at' => '2020-05-31 10:13:59',
                'updated_at' => '2020-06-02 21:39:21',
            ),
            2 => 
            array (
                'id' => 44,
                'makh' => '93e4272',
                'contact_fname' => 'zxc',
                'contact_lname' => 'zxc',
                'address' => 'Tổ 4 - Thôn Đồng Thanh - Xã Hoành Mô - Huyện Bình Liêu - Tỉnh Quảng Ninh - VietNam',
                'city' => 'Bình Liêu',
                'country' => 'Vietnam',
                'phone' => '+84962743002',
                'email' => 'laquyettam1995@gmail.com',
                'user_id' => 141,
                'avatar' => 'http://localhost:8000/storage/customers/44/image/thit.jpg',
                'created_at' => '2020-07-16 19:10:25',
                'updated_at' => '2020-07-16 19:27:39',
            ),
            3 => 
            array (
                'id' => 50,
                'makh' => 'B852430',
                'contact_fname' => 'nha cc 2',
                'contact_lname' => 'last name',
                'address' => 'Dong Thanh - Hoanh Mo
Binh Lieu',
                'city' => 'Quang Ninh',
                'country' => 'Vietnam',
                'phone' => '0962743002',
                'email' => 'ncc@gmail.com',
                'user_id' => 146,
                'avatar' => 'http://localhost:8000/storage/customers/50/image/VueLifeCycle.png',
                'created_at' => '2020-07-19 11:19:15',
                'updated_at' => '2021-10-06 13:09:15',
            ),
            4 => 
            array (
                'id' => 51,
                'makh' => 'B852411',
                'contact_fname' => 'demo',
                'contact_lname' => '10',
                'address' => 'Tổ 4 - Thôn Đồng Thanh - Xã Hoành Mô - Huyện Bình Liêu - Tỉnh Quảng Ninh - VietNam',
                'city' => 'Quang Ninh',
                'country' => 'Vietnam',
                'phone' => '+84962743002',
                'email' => 'categorymanage@gmail.com',
                'user_id' => 149,
                'avatar' => 'http://localhost:8000/storage/customers/51/image/VueLifeCycle.png',
                'created_at' => '2020-07-19 18:30:40',
                'updated_at' => '2021-10-06 13:14:01',
            ),
        ));
        
        
    }
}