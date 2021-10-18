<?php



use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$b6GIgfNB6rbGN98hh1r1MOIjVjDwPc/3DO9ePpoLFMl7QhQZYfWUe',
                'remember_token' => NULL,
                'created_at' => '2020-03-29 14:28:54',
                'updated_at' => '2021-10-06 12:55:33',
            ),
            1 => 
            array (
                'id' => 135,
                'name' => 'Sell',
                'email' => 'sell@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Fy/9BOliykcDtgHqwXPlvuPGCn54tb4jPkFvhvU6sEbSCrYqgMxQ2',
                'remember_token' => NULL,
                'created_at' => '2020-05-31 09:54:14',
                'updated_at' => '2021-10-06 12:56:30',
            ),
            2 => 
            array (
                'id' => 136,
                'name' => 'customer',
                'email' => 'customer@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$JBo6H341XyFFBZU4KonW6.OBiGUkogh9eJ8CrrJTCgy7zbxvR322a',
                'remember_token' => NULL,
                'created_at' => '2020-05-31 09:54:54',
                'updated_at' => '2021-10-06 13:02:43',
            ),
            3 => 
            array (
                'id' => 141,
                'name' => 'Supplier',
                'email' => 'supplier@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$IpAPkYNnj297PpRE6Ld1n.fow1GwtWIPayvOvR7/sEamrPAFrgwHq',
                'remember_token' => NULL,
                'created_at' => '2020-07-16 19:10:25',
                'updated_at' => '2021-10-06 12:59:56',
            ),
            4 => 
            array (
                'id' => 146,
                'name' => 'CustomerManagement',
                'email' => 'customermanage@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$JBElAwaru7fwLBTcY82Ysuiuown8NAz17TZji9yRWlbSam3zKHfPa',
                'remember_token' => NULL,
                'created_at' => '2020-07-19 11:19:15',
                'updated_at' => '2021-10-06 13:05:28',
            ),
            5 => 
            array (
                'id' => 149,
                'name' => 'Category Manager',
                'email' => 'categorymanage@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$gzMdDgEU0WPCAiy9WIz3y.HOrFbE39lB8MQ9O49K/lffhr/eL5Ebq',
                'remember_token' => NULL,
                'created_at' => '2020-07-19 18:30:40',
                'updated_at' => '2021-10-06 13:04:24',
            ),
        ));
        
        
    }
}