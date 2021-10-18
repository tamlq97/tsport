<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-03-29 14:28:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'sell employee',
                'guard_name' => 'api',
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2020-05-15 05:29:24',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'supplier',
                'guard_name' => 'api',
                'created_at' => '2020-04-14 01:00:00',
                'updated_at' => '2020-04-13 17:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'customer',
                'guard_name' => 'api',
                'created_at' => '2020-04-13 17:00:00',
                'updated_at' => '2020-04-13 17:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'management',
                'guard_name' => 'api',
                'created_at' => '2020-04-13 17:00:00',
                'updated_at' => '2020-05-10 20:00:35',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'category_management',
                'guard_name' => 'api',
                'created_at' => '2020-05-31 12:47:44',
                'updated_at' => '2020-05-31 12:47:44',
            ),
            6 => 
            array (
                'id' => 10,
                'name' => 'customer_management',
                'guard_name' => 'api',
                'created_at' => '2020-06-02 20:27:03',
                'updated_at' => '2020-06-02 20:27:03',
            ),
        ));
        
        
    }
}