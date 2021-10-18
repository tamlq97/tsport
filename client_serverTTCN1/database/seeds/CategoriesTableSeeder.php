<?php



use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'mens',
                'description' => NULL,
                'slug' => 'mens',
                '_lft' => 0,
                '_rgt' => 0,
                'parent_id' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-05-31 12:54:16',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'womens',
                'description' => NULL,
                'slug' => 'womens',
                '_lft' => 0,
                '_rgt' => 0,
                'parent_id' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'accessories',
                'description' => NULL,
                'slug' => 'accessories',
                '_lft' => 0,
                '_rgt' => 0,
                'parent_id' => NULL,
                'created_at' => NULL,
                'updated_at' => '2020-05-31 01:25:25',
            ),
        ));
        
        
    }
}