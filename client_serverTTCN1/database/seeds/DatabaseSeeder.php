<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createdPermission();
        $this->createRole();
        $this->createSuperAdmin();
        $this->createUser();
        sleep(2);
        $this->assignRole();
        $this->createColors();
        $this->createSizes();
        $this->createProduct();
        $this->createCategories();
        $this->createSubCategories();
        $this->createSuppliers();
    }

    public function createCategories()
    {
        $faker = \Faker\Factory::create();
        DB::table('categories')->insert([
            [
                'name' => 'Mens',
                'description' => $faker->paragraph(),
                'slug' => $faker->unique()->slug
            ],
            [
                'name' => 'Womens',
                'description' => $faker->paragraph(),
                'slug' => $faker->unique()->slug
            ],
            [
                'name' => 'Accessories',
                'description' => $faker->paragraph(),
                'slug' => $faker->unique()->slug
            ],
        ]);
    }

    public function createSubCategories()
    {
        $mens = [
            'name' => 'shop by category',
            'category_id' => 1,
            'children' => [
                ['name' => 'all products', 'category_id' => 1,],
                ['name' => 'base layers', 'category_id' => 1,],
                ['name' => 'pants', 'category_id' => 1,],
                ['name' => 'hoodies & jackets', 'category_id' => 1,],
                ['name' => 'shorts', 'category_id' => 1,],
                ['name' => 't-shirts & tops', 'category_id' => 1,],
            ]
        ];
        App\SubCategory::create($mens);

        $mens1 =
            [
                'name' => 'shop by collection',
                'category_id' => 1,
                'children' => [
                    ['name' => 'arrival', 'category_id' => 1,],
                    ['name' => 'legacy', 'category_id' => 1,],
                    ['name' => 'seamless', 'category_id' => 1,],
                    ['name' => 'speed', 'category_id' => 1,],
                ]
            ];
        App\SubCategory::create($mens1);
        $womens = [
            'name' => 'shop by category',
            'category_id' => 2,
            'children' => [
                ['name' => 'all products', 'category_id' => 2,],
                ['name' => 'pants & leggings', 'category_id' => 2,],
                ['name' => 'crop tops', 'category_id' => 2,],
                ['name' => 'hoodies & jackets', 'category_id' => 2,],
                ['name' => 'shorts', 'category_id' => 2,],
                ['name' => 'swimmwear', 'category_id' => 2,],
            ]
        ];
        App\SubCategory::create($womens);
        $womens1 =
            [
                'name' => 'shop by collection',
                'category_id' => 2,
                'children' => [
                    ['name' => 'camo', 'category_id' => 2,],
                    ['name' => 'energy', 'category_id' => 2,],
                    ['name' => 'fit', 'category_id' => 2,],
                    ['name' => 'flex', 'category_id' => 2,],
                ]
            ];
        App\SubCategory::create($womens1);
        $accessories = [
            'name' => 'accessories',
            'category_id' => 3,
            'children' => [
                ['name' => 'bags', 'category_id' => 3,],
                ['name' => 'bottles', 'category_id' => 3,],
                ['name' => 'equipment', 'category_id' => 3,],
                ['name' => 'headwear', 'category_id' => 3,],
                ['name' => 'view all', 'category_id' => 3,],
            ]
        ];

        App\SubCategory::create($accessories);
    }

    public function createSizes()
    {
        $sizes = [
            'S', 'M', 'L', 'XL', 'XXL'
        ];
        foreach ($sizes as $v) {
            \App\Size::create(['name' => $v]);
        }
    }

    public function createSuppliers()
    {
        factory(\App\Supplier::class, 10)->create();
    }

    public function createColors()
    {
        $colors = ["AliceBlue", "AntiqueWhite", "Aqua", "Aquamarine", "Azure", "Beige", "Bisque", "Black", "BlanchedAlmond", "Blue", "BlueViolet", "Brown", "BurlyWood", "CadetBlue", "Chartreuse", "Chocolate", "Coral", "CornflowerBlue", "Cornsilk", "Crimson", "Cyan", "DarkBlue", "DarkCyan", "DarkGoldenRod", "DarkGray", "DarkGrey", "DarkGreen", "DarkKhaki", "DarkMagenta", "DarkOliveGreen", "DarkOrange", "DarkOrchid", "DarkRed", "DarkSalmon", "DarkSeaGreen", "DarkSlateBlue", "DarkSlateGray", "DarkSlateGrey", "DarkTurquoise", "DarkViolet", "DeepPink", "DeepSkyBlue", "DimGray", "DimGrey", "DodgerBlue", "FireBrick", "FloralWhite", "ForestGreen", "Fuchsia", "Gainsboro", "GhostWhite", "Gold", "GoldenRod", "Gray", "Grey", "Green", "GreenYellow", "HoneyDew", "HotPink", "IndianRed", "Indigo", "Ivory", "Khaki", "Lavender", "LavenderBlush", "LawnGreen", "LemonChiffon", "LightBlue", "LightCoral", "LightCyan", "LightGoldenRodYellow", "LightGray", "LightGrey", "LightGreen", "LightPink", "LightSalmon", "LightSeaGreen", "LightSkyBlue", "LightSlateGray", "LightSlateGrey", "LightSteelBlue", "LightYellow", "Lime", "LimeGreen", "Linen", "Magenta", "Maroon", "MediumAquaMarine", "MediumBlue", "MediumOrchid", "MediumPurple", "MediumSeaGreen", "MediumSlateBlue", "MediumSpringGreen", "MediumTurquoise", "MediumVioletRed", "MidnightBlue", "MintCream", "MistyRose", "Moccasin", "NavajoWhite", "Navy", "OldLace", "Olive", "OliveDrab", "Orange", "OrangeRed", "Orchid", "PaleGoldenRod", "PaleGreen", "PaleTurquoise", "PaleVioletRed", "PapayaWhip", "PeachPuff", "Peru", "Pink", "Plum", "PowderBlue", "Purple", "RebeccaPurple", "Red", "RosyBrown", "RoyalBlue", "SaddleBrown", "Salmon", "SandyBrown", "SeaGreen", "SeaShell", "Sienna", "Silver", "SkyBlue", "SlateBlue", "SlateGray", "SlateGrey", "Snow", "SpringGreen", "SteelBlue", "Tan", "Teal", "Thistle", "Tomato", "Turquoise", "Violet", "Wheat", "White", "WhiteSmoke", "Yellow", "YellowGreen"];
        foreach ($colors as $v) {
            \App\Color::create(['name' => strtolower($v)]);
        }
    }
    public function createProduct()
    {
        factory(\App\Product::class, 100)->create();
    }
    public function createUser()
    {
        \App\User::create(['name' => 'User', 'email' => 'user@gmail.com', 'password' => \Illuminate\Support\Facades\Hash::make('user@gmail.com')]);
        factory(App\User::class, 100)->create();
    }
    public function createdPermission()
    {
        $permissions = [
            ['name' => 'access_management', 'guard_name' => 'api'],
            ['name' => 'access_user', 'guard_name' => 'api'],
            ['name' => 'view_user', 'guard_name' => 'api'],
            ['name' => 'create_user', 'guard_name' => 'api'],
            ['name' => 'edit_user', 'guard_name' => 'api'],
            ['name' => 'delete_user', 'guard_name' => 'api'],

            ['name' => 'access_role', 'guard_name' => 'api'],
            ['name' => 'view_role', 'guard_name' => 'api'],
            ['name' => 'create_role', 'guard_name' => 'api'],
            ['name' => 'edit_role', 'guard_name' => 'api'],
            ['name' => 'delete_role', 'guard_name' => 'api'],

            ['name' => 'access_permission', 'guard_name' => 'api'],
            ['name' => 'view_permission', 'guard_name' => 'api'],
            ['name' => 'create_permission', 'guard_name' => 'api'],
            ['name' => 'edit_permission', 'guard_name' => 'api'],
            ['name' => 'delete_permission', 'guard_name' => 'api'],
        ];
        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }
    }
    public function createRole()
    {
        $roles = [
            ['name' => 'admin', 'guard_name' => 'api'],
            ['name' => 'moderable', 'guard_name' => 'api'],
        ];
        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }

    public function assignRole()
    {
        $admin = Role::find(1);
        $moderable = Role::find(2);
        $permissions = Permission::all();
        $persID = [];
        foreach ($permissions as $key => $value) {
            // $admin->givePermissionTo($value);
            array_push($persID, $value['id']);
        };

        sleep(2);
        $admin->syncPermissions($persID);
        $moderable->syncPermissions([1, 2, 7, 12]);
    }
    public function createSuperAdmin()
    {
        $admin = \App\User::create(['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => \Illuminate\Support\Facades\Hash::make('admin@gmail.com')]);
        $admin->syncRoles([1]);
    }
}
