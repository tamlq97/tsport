<?php



use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suppliers')->delete();
        
        \DB::table('suppliers')->insert(array (
            0 => 
            array (
                'id' => 31,
                'supplier_code' => '42495da',
                'company_name' => 'Cong ty 3 e1',
                'contact_fname' => 'zxc',
                'contact_lname' => 'zxc',
                'contact_title' => NULL,
                'address' => 'Tổ 4 - Thôn Đồng Thanh - Xã Hoành Mô - Huyện Bình Liêu - Tỉnh Quảng Ninh - VietNam',
                'address2' => NULL,
                'city' => 'Bình Liêu',
                'state' => NULL,
                'postal_code' => NULL,
                'country' => 'Vietnam',
                'phone' => '+84962743002',
                'fax' => NULL,
                'email' => 'demo5@gmail.com',
                'website' => NULL,
                'payment_methods' => NULL,
                'discount_type' => NULL,
                'discount_rate' => NULL,
                'type_goods' => NULL,
                'discount_available' => NULL,
                'current_order' => NULL,
                'user_id' => 141,
                'size_url' => NULL,
                'logo' => 'http://localhost:8000/storage/users/141/suppliers/38//thit.jpg',
                'ranking' => NULL,
                'note' => NULL,
                'created_at' => '2020-07-16 19:10:25',
                'updated_at' => '2020-07-16 19:21:58',
            ),
            1 => 
            array (
                'id' => 42,
                'supplier_code' => '96d6f9f',
                'company_name' => 'Cong ty ncc',
                'contact_fname' => 'zxc',
                'contact_lname' => 'zxc',
                'contact_title' => NULL,
                'address' => 'Tổ 4 - Thôn Đồng Thanh - Xã Hoành Mô - Huyện Bình Liêu - Tỉnh Quảng Ninh - VietNam',
                'address2' => NULL,
                'city' => 'Bình Liêu',
                'state' => NULL,
                'postal_code' => NULL,
                'country' => 'Vietnam',
                'phone' => '+84962743002',
                'fax' => NULL,
                'email' => 'ncc@gmail.com',
                'website' => NULL,
                'payment_methods' => NULL,
                'discount_type' => NULL,
                'discount_rate' => NULL,
                'type_goods' => NULL,
                'discount_available' => NULL,
                'current_order' => NULL,
                'user_id' => 146,
                'size_url' => NULL,
                'logo' => 'http://localhost:8000/storage/users/146/suppliers/42//thit.jpg',
                'ranking' => NULL,
                'note' => NULL,
                'created_at' => '2020-07-19 11:19:15',
                'updated_at' => '2020-07-19 11:19:35',
            ),
        ));
        
        
    }
}