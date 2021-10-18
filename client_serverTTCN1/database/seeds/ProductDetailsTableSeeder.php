<?php



use Illuminate\Database\Seeder;

class ProductDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_details')->delete();
        
        
        
    }
}