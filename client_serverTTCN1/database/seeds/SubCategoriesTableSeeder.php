<?php



use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_categories')->delete();
        
        \DB::table('sub_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'shop by category',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 1,
                '_rgt' => 16,
                'parent_id' => NULL,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'shop-by-category',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'base layers',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 12,
                '_rgt' => 13,
                'parent_id' => 1,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-05-31 01:25:46',
                'slug' => 'base-layers',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'pants',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 4,
                '_rgt' => 5,
                'parent_id' => 1,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'pants',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'hoodies & jackets',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 6,
                '_rgt' => 7,
                'parent_id' => 1,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'hoodies-jackets',
            ),
            4 => 
            array (
                'id' => 6,
                'name' => 'shorts',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 8,
                '_rgt' => 9,
                'parent_id' => 1,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'shorts',
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 't-shirts & tops',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 10,
                '_rgt' => 11,
                'parent_id' => 1,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 't-shirts-tops',
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'shop by collection',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 17,
                '_rgt' => 30,
                'parent_id' => NULL,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'shop-by-collection',
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'arrival',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 18,
                '_rgt' => 19,
                'parent_id' => 8,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'arrival',
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'legacy',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 20,
                '_rgt' => 21,
                'parent_id' => 8,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'legacy',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'seamless',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 22,
                '_rgt' => 23,
                'parent_id' => 8,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'seamless',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'speed',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 24,
                '_rgt' => 25,
                'parent_id' => 8,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'speed',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'shop by category',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 31,
                '_rgt' => 44,
                'parent_id' => NULL,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'shop-by-category',
            ),
            12 => 
            array (
                'id' => 15,
                'name' => 'pants & leggings',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 42,
                '_rgt' => 43,
                'parent_id' => 13,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-05-31 01:24:42',
                'slug' => 'pants-leggings',
            ),
            13 => 
            array (
                'id' => 16,
                'name' => 'crop tops',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 34,
                '_rgt' => 35,
                'parent_id' => 13,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'crop-tops',
            ),
            14 => 
            array (
                'id' => 17,
                'name' => 'hoodies & jackets',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 36,
                '_rgt' => 37,
                'parent_id' => 13,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'hoodies-jackets',
            ),
            15 => 
            array (
                'id' => 18,
                'name' => 'shorts',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 38,
                '_rgt' => 39,
                'parent_id' => 13,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'shorts',
            ),
            16 => 
            array (
                'id' => 19,
                'name' => 'swimmwear',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 40,
                '_rgt' => 41,
                'parent_id' => 13,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'swimmwear',
            ),
            17 => 
            array (
                'id' => 20,
                'name' => 'shop by collection',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 45,
                '_rgt' => 54,
                'parent_id' => NULL,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'shop-by-collection',
            ),
            18 => 
            array (
                'id' => 21,
                'name' => 'camo',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 46,
                '_rgt' => 47,
                'parent_id' => 20,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'camo',
            ),
            19 => 
            array (
                'id' => 22,
                'name' => 'energy',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 48,
                '_rgt' => 49,
                'parent_id' => 20,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'energy',
            ),
            20 => 
            array (
                'id' => 23,
                'name' => 'fit',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 50,
                '_rgt' => 51,
                'parent_id' => 20,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'fit',
            ),
            21 => 
            array (
                'id' => 24,
                'name' => 'flex',
                'description' => NULL,
                'category_id' => 2,
                '_lft' => 52,
                '_rgt' => 53,
                'parent_id' => 20,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'flex',
            ),
            22 => 
            array (
                'id' => 25,
                'name' => 'accessories',
                'description' => NULL,
                'category_id' => 3,
                '_lft' => 55,
                '_rgt' => 66,
                'parent_id' => NULL,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'accessories',
            ),
            23 => 
            array (
                'id' => 26,
                'name' => 'bags',
                'description' => NULL,
                'category_id' => 3,
                '_lft' => 56,
                '_rgt' => 57,
                'parent_id' => 25,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-05-31 02:18:29',
                'slug' => 'bags',
            ),
            24 => 
            array (
                'id' => 27,
                'name' => 'bottles',
                'description' => NULL,
                'category_id' => 3,
                '_lft' => 58,
                '_rgt' => 59,
                'parent_id' => 25,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'bottles',
            ),
            25 => 
            array (
                'id' => 28,
                'name' => 'equipment',
                'description' => NULL,
                'category_id' => 3,
                '_lft' => 60,
                '_rgt' => 61,
                'parent_id' => 25,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'equipment',
            ),
            26 => 
            array (
                'id' => 29,
                'name' => 'headwear',
                'description' => NULL,
                'category_id' => 3,
                '_lft' => 62,
                '_rgt' => 63,
                'parent_id' => 25,
                'created_at' => '2020-04-06 06:52:50',
                'updated_at' => '2020-04-09 08:57:04',
                'slug' => 'headwear',
            ),
            27 => 
            array (
                'id' => 39,
                'name' => 'something',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 14,
                '_rgt' => 15,
                'parent_id' => 1,
                'created_at' => '2020-07-19 11:20:38',
                'updated_at' => '2020-07-19 11:20:47',
                'slug' => 'something',
            ),
            28 => 
            array (
                'id' => 40,
                'name' => 'news',
                'description' => NULL,
                'category_id' => 1,
                '_lft' => 28,
                '_rgt' => 29,
                'parent_id' => 8,
                'created_at' => '2020-08-27 22:29:34',
                'updated_at' => '2020-08-27 22:29:34',
                'slug' => 'news',
            ),
        ));
        
        
    }
}