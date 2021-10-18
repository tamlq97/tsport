<?php



use Illuminate\Database\Seeder;

class ShippingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shippings')->delete();
        
        \DB::table('shippings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'shipping_type' => 'Express',
                'phone' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'description' => '1-3 Working Days',
            ),
            1 => 
            array (
                'id' => 2,
                'shipping_type' => 'Standard',
                'phone' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
                'description' => '4-7 Working Days',
            ),
        ));
        
        
    }
}