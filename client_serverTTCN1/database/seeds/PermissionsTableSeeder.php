<?php



use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'access_user',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'view_user',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'create_user',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'edit_user',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'delete_user',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'access_role',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'view_role',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'create_role',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'edit_role',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'delete_role',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'access_permission',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'view_permission',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'create_permission',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'edit_permission',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'delete_permission',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'access_product',
                'guard_name' => 'api',
                'created_at' => '2020-04-14 07:25:46',
                'updated_at' => '2020-04-14 07:25:46',
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'create_product',
                'guard_name' => 'api',
                'created_at' => '2020-04-14 07:25:56',
                'updated_at' => '2020-04-14 07:25:56',
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'view_product',
                'guard_name' => 'api',
                'created_at' => '2020-04-14 07:26:05',
                'updated_at' => '2020-04-14 07:26:05',
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'edit_product',
                'guard_name' => 'api',
                'created_at' => '2020-04-14 07:26:15',
                'updated_at' => '2020-04-14 07:26:15',
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'delete_product',
                'guard_name' => 'api',
                'created_at' => '2020-04-14 07:26:19',
                'updated_at' => '2020-04-14 07:26:19',
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'access_supplier',
                'guard_name' => 'api',
                'created_at' => '2020-04-16 14:34:36',
                'updated_at' => '2020-04-16 14:34:36',
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'create_supplier',
                'guard_name' => 'api',
                'created_at' => '2020-04-16 14:34:46',
                'updated_at' => '2020-04-16 14:34:46',
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'view_supplier',
                'guard_name' => 'api',
                'created_at' => '2020-04-16 14:34:52',
                'updated_at' => '2020-04-16 14:34:52',
            ),
            23 => 
            array (
                'id' => 25,
                'name' => 'edit_supplier',
                'guard_name' => 'api',
                'created_at' => '2020-04-16 14:34:57',
                'updated_at' => '2020-04-16 14:34:57',
            ),
            24 => 
            array (
                'id' => 26,
                'name' => 'delete_supplier',
                'guard_name' => 'api',
                'created_at' => '2020-04-16 14:35:02',
                'updated_at' => '2020-04-16 14:35:02',
            ),
            25 => 
            array (
                'id' => 27,
                'name' => 'access_management',
                'guard_name' => 'api',
                'created_at' => '2020-04-28 13:50:07',
                'updated_at' => '2020-05-10 20:02:24',
            ),
            26 => 
            array (
                'id' => 29,
                'name' => 'access_order_manager',
                'guard_name' => 'api',
                'created_at' => '2020-05-16 09:28:49',
                'updated_at' => '2020-05-16 09:28:49',
            ),
            27 => 
            array (
                'id' => 30,
                'name' => 'view_order_manager',
                'guard_name' => 'api',
                'created_at' => '2020-05-16 09:28:59',
                'updated_at' => '2020-05-16 09:28:59',
            ),
            28 => 
            array (
                'id' => 31,
                'name' => 'confirm_order',
                'guard_name' => 'api',
                'created_at' => '2020-05-16 09:29:08',
                'updated_at' => '2020-05-16 09:29:08',
            ),
            29 => 
            array (
                'id' => 32,
                'name' => 'order_out_of_stock',
                'guard_name' => 'api',
                'created_at' => '2020-05-16 09:29:55',
                'updated_at' => '2020-05-16 09:29:55',
            ),
            30 => 
            array (
                'id' => 33,
                'name' => 'delete_order',
                'guard_name' => 'api',
                'created_at' => '2020-05-16 09:30:01',
                'updated_at' => '2020-05-16 09:30:01',
            ),
            31 => 
            array (
                'id' => 34,
                'name' => 'create_order',
                'guard_name' => 'api',
                'created_at' => '2020-05-16 09:33:41',
                'updated_at' => '2020-05-16 09:33:41',
            ),
            32 => 
            array (
                'id' => 35,
                'name' => 'create_customer',
                'guard_name' => 'api',
                'created_at' => '2020-05-18 08:20:56',
                'updated_at' => '2020-05-18 08:20:56',
            ),
            33 => 
            array (
                'id' => 36,
                'name' => 'edit_customer',
                'guard_name' => 'api',
                'created_at' => '2020-05-18 08:21:05',
                'updated_at' => '2020-05-18 08:21:05',
            ),
            34 => 
            array (
                'id' => 37,
                'name' => 'view_customer',
                'guard_name' => 'api',
                'created_at' => '2020-05-18 08:21:12',
                'updated_at' => '2020-05-18 08:21:12',
            ),
            35 => 
            array (
                'id' => 38,
                'name' => 'delete_customer',
                'guard_name' => 'api',
                'created_at' => '2020-05-18 08:21:17',
                'updated_at' => '2020-05-18 08:21:17',
            ),
            36 => 
            array (
                'id' => 39,
                'name' => 'access_customer_manager',
                'guard_name' => 'api',
                'created_at' => '2020-05-18 08:21:27',
                'updated_at' => '2020-05-18 08:21:27',
            ),
            37 => 
            array (
                'id' => 40,
                'name' => 'view_task_management',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 09:27:16',
                'updated_at' => '2020-05-31 09:27:16',
            ),
            38 => 
            array (
                'id' => 41,
                'name' => 'edit_category',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 12:45:18',
                'updated_at' => '2020-05-31 12:45:18',
            ),
            39 => 
            array (
                'id' => 42,
                'name' => 'create_category',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 12:45:27',
                'updated_at' => '2020-05-31 12:45:27',
            ),
            40 => 
            array (
                'id' => 43,
                'name' => 'access_category',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 12:45:37',
                'updated_at' => '2020-05-31 12:45:37',
            ),
            41 => 
            array (
                'id' => 44,
                'name' => 'view_category',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 12:45:46',
                'updated_at' => '2020-05-31 12:45:46',
            ),
            42 => 
            array (
                'id' => 45,
                'name' => 'delete_category',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 12:45:55',
                'updated_at' => '2020-05-31 12:45:55',
            ),
            43 => 
            array (
                'id' => 46,
                'name' => 'create_subcategory',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 12:46:21',
                'updated_at' => '2020-05-31 12:46:21',
            ),
            44 => 
            array (
                'id' => 47,
                'name' => 'edit_subcategory',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 12:46:33',
                'updated_at' => '2020-05-31 12:46:33',
            ),
            45 => 
            array (
                'id' => 48,
                'name' => 'delete_subcategory',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 12:46:39',
                'updated_at' => '2020-05-31 12:46:39',
            ),
            46 => 
            array (
                'id' => 49,
                'name' => 'access_customer',
                'guard_name' => 'api',
                'created_at' => '2020-06-02 20:27:47',
                'updated_at' => '2020-06-02 20:27:47',
            ),
        ));
        
        
    }
}