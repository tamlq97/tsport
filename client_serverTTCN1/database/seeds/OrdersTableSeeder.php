<?php



use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 199,
                'madh' => '79aec5c',
                'user_id' => '137',
                'payment_id' => 1,
                'order_date' => '2020-07-17 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-07-16 18:38:44',
                'updated_at' => '2020-07-16 18:38:44',
            ),
            1 => 
            array (
                'id' => 200,
                'madh' => '39ca827',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-07-17 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-07-16 18:39:54',
                'updated_at' => '2020-07-16 18:39:54',
            ),
            2 => 
            array (
                'id' => 201,
                'madh' => '99456da',
                'user_id' => '141',
                'payment_id' => 1,
                'order_date' => '2020-07-17 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-07-16 19:27:50',
                'updated_at' => '2020-07-16 19:27:50',
            ),
            3 => 
            array (
                'id' => 202,
                'madh' => 'A89f5bf',
                'user_id' => '143',
                'payment_id' => 1,
                'order_date' => '2020-07-17 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-07-16 19:56:00',
                'updated_at' => '2020-07-16 19:56:00',
            ),
            4 => 
            array (
                'id' => 204,
                'madh' => '8De530a',
                'user_id' => '137',
                'payment_id' => 1,
                'order_date' => '2020-07-19 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-07-19 11:26:17',
                'updated_at' => '2020-07-19 11:26:17',
            ),
            5 => 
            array (
                'id' => 205,
                'madh' => '3A7fa6a',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-07-20 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-07-19 17:57:23',
                'updated_at' => '2020-07-19 17:57:23',
            ),
            6 => 
            array (
                'id' => 206,
                'madh' => '5B415cf',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:17:12',
                'updated_at' => '2020-08-07 18:17:12',
            ),
            7 => 
            array (
                'id' => 207,
                'madh' => '08559e6',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:17:59',
                'updated_at' => '2020-08-07 18:17:59',
            ),
            8 => 
            array (
                'id' => 208,
                'madh' => '935e908',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:23:43',
                'updated_at' => '2020-08-07 18:23:43',
            ),
            9 => 
            array (
                'id' => 209,
                'madh' => '6Bbe607',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:26:31',
                'updated_at' => '2020-08-07 18:26:31',
            ),
            10 => 
            array (
                'id' => 210,
                'madh' => '60c418f',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:27:09',
                'updated_at' => '2020-08-07 18:27:09',
            ),
            11 => 
            array (
                'id' => 211,
                'madh' => 'A756a2c',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:28:38',
                'updated_at' => '2020-08-07 18:28:38',
            ),
            12 => 
            array (
                'id' => 212,
                'madh' => 'BF3aee5',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:33:19',
                'updated_at' => '2020-08-07 18:33:19',
            ),
            13 => 
            array (
                'id' => 213,
                'madh' => '617bc1c',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:36:50',
                'updated_at' => '2020-08-07 18:36:50',
            ),
            14 => 
            array (
                'id' => 214,
                'madh' => 'E78f041',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:37:20',
                'updated_at' => '2020-08-07 18:37:20',
            ),
            15 => 
            array (
                'id' => 215,
                'madh' => 'D5823e2',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:38:10',
                'updated_at' => '2020-08-07 18:38:10',
            ),
            16 => 
            array (
                'id' => 216,
                'madh' => '6F1a350',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:40:00',
                'updated_at' => '2020-08-07 18:40:00',
            ),
            17 => 
            array (
                'id' => 217,
                'madh' => '6B041c4',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:44:41',
                'updated_at' => '2020-08-07 18:44:41',
            ),
            18 => 
            array (
                'id' => 218,
                'madh' => '73f23ae',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:46:24',
                'updated_at' => '2020-08-07 18:46:24',
            ),
            19 => 
            array (
                'id' => 219,
                'madh' => 'AA6c298',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:48:20',
                'updated_at' => '2020-08-07 18:48:20',
            ),
            20 => 
            array (
                'id' => 220,
                'madh' => '4Df09d5',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:50:08',
                'updated_at' => '2020-08-07 18:50:08',
            ),
            21 => 
            array (
                'id' => 221,
                'madh' => 'FD153ec',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:50:36',
                'updated_at' => '2020-08-07 18:50:36',
            ),
            22 => 
            array (
                'id' => 222,
                'madh' => '3E9e83b',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 18:51:01',
                'updated_at' => '2020-08-07 18:51:01',
            ),
            23 => 
            array (
                'id' => 223,
                'madh' => 'D2287bb',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 19:08:22',
                'updated_at' => '2020-08-07 19:08:22',
            ),
            24 => 
            array (
                'id' => 224,
                'madh' => 'B420b11',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-08-08 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-08-07 19:08:52',
                'updated_at' => '2020-08-07 19:08:52',
            ),
            25 => 
            array (
                'id' => 225,
                'madh' => 'C58da28',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-09-04 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-09-04 04:21:25',
                'updated_at' => '2020-09-04 04:21:25',
            ),
            26 => 
            array (
                'id' => 226,
                'madh' => 'C07d626',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-09-04 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-09-04 04:22:50',
                'updated_at' => '2020-09-04 04:22:50',
            ),
            27 => 
            array (
                'id' => 227,
                'madh' => 'EA12751',
                'user_id' => '135',
                'payment_id' => 1,
                'order_date' => '2020-09-04 00:00:00',
                'required_date' => NULL,
                'ship_date' => NULL,
                'created_at' => '2020-09-04 04:30:22',
                'updated_at' => '2020-09-04 04:30:22',
            ),
        ));
        
        
    }
}