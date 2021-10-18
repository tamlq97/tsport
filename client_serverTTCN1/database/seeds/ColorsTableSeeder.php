<?php



use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colors')->delete();
        
        \DB::table('colors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'aliceblue',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'antiquewhite',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'aqua',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'aquamarine',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'azure',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'beige',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'bisque',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'black',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'blanchedalmond',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'blue',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'blueviolet',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'brown',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'burlywood',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'cadetblue',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'chartreuse',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'chocolate',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'coral',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'cornflowerblue',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'cornsilk',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'crimson',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'cyan',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'darkblue',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'darkcyan',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'darkgoldenrod',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'darkgray',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'darkgrey',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'darkgreen',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'darkkhaki',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'darkmagenta',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'darkolivegreen',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'darkorange',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'darkorchid',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'darkred',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'darksalmon',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'darkseagreen',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'darkslateblue',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'darkslategray',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'darkslategrey',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'darkturquoise',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'darkviolet',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'deeppink',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'deepskyblue',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'dimgray',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'dimgrey',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'dodgerblue',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'firebrick',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'floralwhite',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'forestgreen',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'fuchsia',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'gainsboro',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'ghostwhite',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'gold',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'goldenrod',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'gray',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'grey',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'green',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'greenyellow',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'honeydew',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'hotpink',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'indianred',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'indigo',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'ivory',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'khaki',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'lavender',
                'created_at' => '2020-03-29 14:28:56',
                'updated_at' => '2020-03-29 14:28:56',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'lavenderblush',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'lawngreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            66 => 
            array (
                'id' => 67,
                'name' => 'lemonchiffon',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            67 => 
            array (
                'id' => 68,
                'name' => 'lightblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            68 => 
            array (
                'id' => 69,
                'name' => 'lightcoral',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            69 => 
            array (
                'id' => 70,
                'name' => 'lightcyan',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            70 => 
            array (
                'id' => 71,
                'name' => 'lightgoldenrodyellow',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            71 => 
            array (
                'id' => 72,
                'name' => 'lightgray',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            72 => 
            array (
                'id' => 73,
                'name' => 'lightgrey',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            73 => 
            array (
                'id' => 74,
                'name' => 'lightgreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            74 => 
            array (
                'id' => 75,
                'name' => 'lightpink',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            75 => 
            array (
                'id' => 76,
                'name' => 'lightsalmon',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            76 => 
            array (
                'id' => 77,
                'name' => 'lightseagreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            77 => 
            array (
                'id' => 78,
                'name' => 'lightskyblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            78 => 
            array (
                'id' => 79,
                'name' => 'lightslategray',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            79 => 
            array (
                'id' => 80,
                'name' => 'lightslategrey',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            80 => 
            array (
                'id' => 81,
                'name' => 'lightsteelblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            81 => 
            array (
                'id' => 82,
                'name' => 'lightyellow',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            82 => 
            array (
                'id' => 83,
                'name' => 'lime',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            83 => 
            array (
                'id' => 84,
                'name' => 'limegreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            84 => 
            array (
                'id' => 85,
                'name' => 'linen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            85 => 
            array (
                'id' => 86,
                'name' => 'magenta',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            86 => 
            array (
                'id' => 87,
                'name' => 'maroon',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            87 => 
            array (
                'id' => 88,
                'name' => 'mediumaquamarine',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            88 => 
            array (
                'id' => 89,
                'name' => 'mediumblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            89 => 
            array (
                'id' => 90,
                'name' => 'mediumorchid',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            90 => 
            array (
                'id' => 91,
                'name' => 'mediumpurple',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            91 => 
            array (
                'id' => 92,
                'name' => 'mediumseagreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            92 => 
            array (
                'id' => 93,
                'name' => 'mediumslateblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            93 => 
            array (
                'id' => 94,
                'name' => 'mediumspringgreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            94 => 
            array (
                'id' => 95,
                'name' => 'mediumturquoise',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            95 => 
            array (
                'id' => 96,
                'name' => 'mediumvioletred',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            96 => 
            array (
                'id' => 97,
                'name' => 'midnightblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            97 => 
            array (
                'id' => 98,
                'name' => 'mintcream',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            98 => 
            array (
                'id' => 99,
                'name' => 'mistyrose',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            99 => 
            array (
                'id' => 100,
                'name' => 'moccasin',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            100 => 
            array (
                'id' => 101,
                'name' => 'navajowhite',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            101 => 
            array (
                'id' => 102,
                'name' => 'navy',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            102 => 
            array (
                'id' => 103,
                'name' => 'oldlace',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            103 => 
            array (
                'id' => 104,
                'name' => 'olive',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            104 => 
            array (
                'id' => 105,
                'name' => 'olivedrab',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            105 => 
            array (
                'id' => 106,
                'name' => 'orange',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            106 => 
            array (
                'id' => 107,
                'name' => 'orangered',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            107 => 
            array (
                'id' => 108,
                'name' => 'orchid',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            108 => 
            array (
                'id' => 109,
                'name' => 'palegoldenrod',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            109 => 
            array (
                'id' => 110,
                'name' => 'palegreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            110 => 
            array (
                'id' => 111,
                'name' => 'paleturquoise',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            111 => 
            array (
                'id' => 112,
                'name' => 'palevioletred',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            112 => 
            array (
                'id' => 113,
                'name' => 'papayawhip',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            113 => 
            array (
                'id' => 114,
                'name' => 'peachpuff',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            114 => 
            array (
                'id' => 115,
                'name' => 'peru',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            115 => 
            array (
                'id' => 116,
                'name' => 'pink',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            116 => 
            array (
                'id' => 117,
                'name' => 'plum',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            117 => 
            array (
                'id' => 118,
                'name' => 'powderblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            118 => 
            array (
                'id' => 119,
                'name' => 'purple',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            119 => 
            array (
                'id' => 120,
                'name' => 'rebeccapurple',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            120 => 
            array (
                'id' => 121,
                'name' => 'red',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            121 => 
            array (
                'id' => 122,
                'name' => 'rosybrown',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            122 => 
            array (
                'id' => 123,
                'name' => 'royalblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            123 => 
            array (
                'id' => 124,
                'name' => 'saddlebrown',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            124 => 
            array (
                'id' => 125,
                'name' => 'salmon',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            125 => 
            array (
                'id' => 126,
                'name' => 'sandybrown',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            126 => 
            array (
                'id' => 127,
                'name' => 'seagreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            127 => 
            array (
                'id' => 128,
                'name' => 'seashell',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            128 => 
            array (
                'id' => 129,
                'name' => 'sienna',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            129 => 
            array (
                'id' => 130,
                'name' => 'silver',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            130 => 
            array (
                'id' => 131,
                'name' => 'skyblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            131 => 
            array (
                'id' => 132,
                'name' => 'slateblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            132 => 
            array (
                'id' => 133,
                'name' => 'slategray',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            133 => 
            array (
                'id' => 134,
                'name' => 'slategrey',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            134 => 
            array (
                'id' => 135,
                'name' => 'snow',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            135 => 
            array (
                'id' => 136,
                'name' => 'springgreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            136 => 
            array (
                'id' => 137,
                'name' => 'steelblue',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            137 => 
            array (
                'id' => 138,
                'name' => 'tan',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            138 => 
            array (
                'id' => 139,
                'name' => 'teal',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            139 => 
            array (
                'id' => 140,
                'name' => 'thistle',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            140 => 
            array (
                'id' => 141,
                'name' => 'tomato',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            141 => 
            array (
                'id' => 142,
                'name' => 'turquoise',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            142 => 
            array (
                'id' => 143,
                'name' => 'violet',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            143 => 
            array (
                'id' => 144,
                'name' => 'wheat',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            144 => 
            array (
                'id' => 145,
                'name' => 'white',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            145 => 
            array (
                'id' => 146,
                'name' => 'whitesmoke',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            146 => 
            array (
                'id' => 147,
                'name' => 'yellow',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
            147 => 
            array (
                'id' => 148,
                'name' => 'yellowgreen',
                'created_at' => '2020-03-29 14:28:57',
                'updated_at' => '2020-03-29 14:28:57',
            ),
        ));
        
        
    }
}