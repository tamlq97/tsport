<?php



use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sizes')->delete();
        
        \DB::table('sizes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'S',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'M',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'L',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'XL',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'XXL',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
        ));
        
        
    }
}