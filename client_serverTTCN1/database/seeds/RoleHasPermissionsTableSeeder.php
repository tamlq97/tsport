<?php



use Illuminate\Database\Seeder;

class RoleHasPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_has_permissions')->delete();
        
        \DB::table('role_has_permissions')->insert(array (
            0 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 2,
                'role_id' => 2,
            ),
            2 => 
            array (
                'permission_id' => 2,
                'role_id' => 5,
            ),
            3 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
            ),
            4 => 
            array (
                'permission_id' => 3,
                'role_id' => 3,
            ),
            5 => 
            array (
                'permission_id' => 3,
                'role_id' => 4,
            ),
            6 => 
            array (
                'permission_id' => 4,
                'role_id' => 1,
            ),
            7 => 
            array (
                'permission_id' => 5,
                'role_id' => 1,
            ),
            8 => 
            array (
                'permission_id' => 5,
                'role_id' => 3,
            ),
            9 => 
            array (
                'permission_id' => 5,
                'role_id' => 4,
            ),
            10 => 
            array (
                'permission_id' => 6,
                'role_id' => 1,
            ),
            11 => 
            array (
                'permission_id' => 7,
                'role_id' => 1,
            ),
            12 => 
            array (
                'permission_id' => 7,
                'role_id' => 2,
            ),
            13 => 
            array (
                'permission_id' => 7,
                'role_id' => 5,
            ),
            14 => 
            array (
                'permission_id' => 8,
                'role_id' => 1,
            ),
            15 => 
            array (
                'permission_id' => 9,
                'role_id' => 1,
            ),
            16 => 
            array (
                'permission_id' => 10,
                'role_id' => 1,
            ),
            17 => 
            array (
                'permission_id' => 11,
                'role_id' => 1,
            ),
            18 => 
            array (
                'permission_id' => 12,
                'role_id' => 1,
            ),
            19 => 
            array (
                'permission_id' => 12,
                'role_id' => 2,
            ),
            20 => 
            array (
                'permission_id' => 12,
                'role_id' => 5,
            ),
            21 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
            ),
            22 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
            ),
            23 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
            ),
            24 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
            ),
            25 => 
            array (
                'permission_id' => 17,
                'role_id' => 1,
            ),
            26 => 
            array (
                'permission_id' => 17,
                'role_id' => 2,
            ),
            27 => 
            array (
                'permission_id' => 17,
                'role_id' => 3,
            ),
            28 => 
            array (
                'permission_id' => 17,
                'role_id' => 4,
            ),
            29 => 
            array (
                'permission_id' => 17,
                'role_id' => 5,
            ),
            30 => 
            array (
                'permission_id' => 18,
                'role_id' => 1,
            ),
            31 => 
            array (
                'permission_id' => 18,
                'role_id' => 3,
            ),
            32 => 
            array (
                'permission_id' => 19,
                'role_id' => 1,
            ),
            33 => 
            array (
                'permission_id' => 19,
                'role_id' => 2,
            ),
            34 => 
            array (
                'permission_id' => 19,
                'role_id' => 3,
            ),
            35 => 
            array (
                'permission_id' => 19,
                'role_id' => 4,
            ),
            36 => 
            array (
                'permission_id' => 20,
                'role_id' => 1,
            ),
            37 => 
            array (
                'permission_id' => 20,
                'role_id' => 2,
            ),
            38 => 
            array (
                'permission_id' => 20,
                'role_id' => 3,
            ),
            39 => 
            array (
                'permission_id' => 21,
                'role_id' => 1,
            ),
            40 => 
            array (
                'permission_id' => 21,
                'role_id' => 3,
            ),
            41 => 
            array (
                'permission_id' => 22,
                'role_id' => 3,
            ),
            42 => 
            array (
                'permission_id' => 22,
                'role_id' => 5,
            ),
            43 => 
            array (
                'permission_id' => 23,
                'role_id' => 3,
            ),
            44 => 
            array (
                'permission_id' => 24,
                'role_id' => 3,
            ),
            45 => 
            array (
                'permission_id' => 25,
                'role_id' => 3,
            ),
            46 => 
            array (
                'permission_id' => 26,
                'role_id' => 3,
            ),
            47 => 
            array (
                'permission_id' => 29,
                'role_id' => 2,
            ),
            48 => 
            array (
                'permission_id' => 30,
                'role_id' => 2,
            ),
            49 => 
            array (
                'permission_id' => 31,
                'role_id' => 2,
            ),
            50 => 
            array (
                'permission_id' => 32,
                'role_id' => 2,
            ),
            51 => 
            array (
                'permission_id' => 33,
                'role_id' => 1,
            ),
            52 => 
            array (
                'permission_id' => 34,
                'role_id' => 2,
            ),
            53 => 
            array (
                'permission_id' => 34,
                'role_id' => 4,
            ),
            54 => 
            array (
                'permission_id' => 35,
                'role_id' => 10,
            ),
            55 => 
            array (
                'permission_id' => 36,
                'role_id' => 4,
            ),
            56 => 
            array (
                'permission_id' => 36,
                'role_id' => 10,
            ),
            57 => 
            array (
                'permission_id' => 37,
                'role_id' => 5,
            ),
            58 => 
            array (
                'permission_id' => 37,
                'role_id' => 10,
            ),
            59 => 
            array (
                'permission_id' => 38,
                'role_id' => 10,
            ),
            60 => 
            array (
                'permission_id' => 40,
                'role_id' => 3,
            ),
            61 => 
            array (
                'permission_id' => 40,
                'role_id' => 4,
            ),
            62 => 
            array (
                'permission_id' => 40,
                'role_id' => 5,
            ),
            63 => 
            array (
                'permission_id' => 41,
                'role_id' => 9,
            ),
            64 => 
            array (
                'permission_id' => 42,
                'role_id' => 9,
            ),
            65 => 
            array (
                'permission_id' => 43,
                'role_id' => 9,
            ),
            66 => 
            array (
                'permission_id' => 44,
                'role_id' => 9,
            ),
            67 => 
            array (
                'permission_id' => 45,
                'role_id' => 9,
            ),
            68 => 
            array (
                'permission_id' => 46,
                'role_id' => 9,
            ),
            69 => 
            array (
                'permission_id' => 47,
                'role_id' => 9,
            ),
            70 => 
            array (
                'permission_id' => 48,
                'role_id' => 9,
            ),
            71 => 
            array (
                'permission_id' => 49,
                'role_id' => 10,
            ),
        ));
        
        
    }
}