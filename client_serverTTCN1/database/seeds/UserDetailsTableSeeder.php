<?php



use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_details')->delete();
        
        \DB::table('user_details')->insert(array (
            0 => 
            array (
                'id' => 10,
                'contact_fname' => 'demo',
                'contact_lname' => '10',
                'address' => 'Tổ 4 - Thôn Đồng Thanh - Xã Hoành Mô - Huyện Bình Liêu - Tỉnh Quảng Ninh - VietNam',
                'city' => 'Quang Ninh',
                'country' => 'Vietnam',
                'phone' => '+84962743002',
                'user_id' => 149,
                'created_at' => '2020-07-19 18:30:40',
                'updated_at' => '2020-07-19 18:30:40',
                'avatar' => NULL,
            ),
        ));
        
        
    }
}