<?php



use Illuminate\Database\Seeder;

class ProductCategoryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_category')->delete();
        
        \DB::table('product_category')->insert(array (
            0 => 
            array (
                'product_id' => 1,
                'sub_category_id' => 3,
            ),
            1 => 
            array (
                'product_id' => 1,
                'sub_category_id' => 6,
            ),
            2 => 
            array (
                'product_id' => 1,
                'sub_category_id' => 4,
            ),
            3 => 
            array (
                'product_id' => 2,
                'sub_category_id' => 3,
            ),
            4 => 
            array (
                'product_id' => 2,
                'sub_category_id' => 6,
            ),
            5 => 
            array (
                'product_id' => 2,
                'sub_category_id' => 4,
            ),
            6 => 
            array (
                'product_id' => 3,
                'sub_category_id' => 3,
            ),
            7 => 
            array (
                'product_id' => 3,
                'sub_category_id' => 6,
            ),
            8 => 
            array (
                'product_id' => 3,
                'sub_category_id' => 4,
            ),
            9 => 
            array (
                'product_id' => 4,
                'sub_category_id' => 3,
            ),
            10 => 
            array (
                'product_id' => 4,
                'sub_category_id' => 6,
            ),
            11 => 
            array (
                'product_id' => 4,
                'sub_category_id' => 4,
            ),
            12 => 
            array (
                'product_id' => 5,
                'sub_category_id' => 3,
            ),
            13 => 
            array (
                'product_id' => 5,
                'sub_category_id' => 11,
            ),
            14 => 
            array (
                'product_id' => 5,
                'sub_category_id' => 4,
            ),
            15 => 
            array (
                'product_id' => 6,
                'sub_category_id' => 3,
            ),
            16 => 
            array (
                'product_id' => 6,
                'sub_category_id' => 4,
            ),
            17 => 
            array (
                'product_id' => 7,
                'sub_category_id' => 3,
            ),
            18 => 
            array (
                'product_id' => 7,
                'sub_category_id' => 4,
            ),
            19 => 
            array (
                'product_id' => 8,
                'sub_category_id' => 3,
            ),
            20 => 
            array (
                'product_id' => 8,
                'sub_category_id' => 4,
            ),
            21 => 
            array (
                'product_id' => 9,
                'sub_category_id' => 3,
            ),
            22 => 
            array (
                'product_id' => 9,
                'sub_category_id' => 4,
            ),
            23 => 
            array (
                'product_id' => 10,
                'sub_category_id' => 3,
            ),
            24 => 
            array (
                'product_id' => 10,
                'sub_category_id' => 4,
            ),
            25 => 
            array (
                'product_id' => 11,
                'sub_category_id' => 3,
            ),
            26 => 
            array (
                'product_id' => 11,
                'sub_category_id' => 4,
            ),
            27 => 
            array (
                'product_id' => 12,
                'sub_category_id' => 3,
            ),
            28 => 
            array (
                'product_id' => 12,
                'sub_category_id' => 4,
            ),
            29 => 
            array (
                'product_id' => 13,
                'sub_category_id' => 3,
            ),
            30 => 
            array (
                'product_id' => 13,
                'sub_category_id' => 4,
            ),
            31 => 
            array (
                'product_id' => 14,
                'sub_category_id' => 3,
            ),
            32 => 
            array (
                'product_id' => 14,
                'sub_category_id' => 4,
            ),
            33 => 
            array (
                'product_id' => 15,
                'sub_category_id' => 3,
            ),
            34 => 
            array (
                'product_id' => 15,
                'sub_category_id' => 4,
            ),
            35 => 
            array (
                'product_id' => 16,
                'sub_category_id' => 3,
            ),
            36 => 
            array (
                'product_id' => 16,
                'sub_category_id' => 4,
            ),
            37 => 
            array (
                'product_id' => 17,
                'sub_category_id' => 3,
            ),
            38 => 
            array (
                'product_id' => 17,
                'sub_category_id' => 6,
            ),
            39 => 
            array (
                'product_id' => 17,
                'sub_category_id' => 4,
            ),
            40 => 
            array (
                'product_id' => 18,
                'sub_category_id' => 3,
            ),
            41 => 
            array (
                'product_id' => 18,
                'sub_category_id' => 4,
            ),
            42 => 
            array (
                'product_id' => 19,
                'sub_category_id' => 3,
            ),
            43 => 
            array (
                'product_id' => 19,
                'sub_category_id' => 4,
            ),
            44 => 
            array (
                'product_id' => 20,
                'sub_category_id' => 3,
            ),
            45 => 
            array (
                'product_id' => 20,
                'sub_category_id' => 4,
            ),
            46 => 
            array (
                'product_id' => 21,
                'sub_category_id' => 3,
            ),
            47 => 
            array (
                'product_id' => 21,
                'sub_category_id' => 4,
            ),
            48 => 
            array (
                'product_id' => 22,
                'sub_category_id' => 3,
            ),
            49 => 
            array (
                'product_id' => 22,
                'sub_category_id' => 4,
            ),
            50 => 
            array (
                'product_id' => 23,
                'sub_category_id' => 3,
            ),
            51 => 
            array (
                'product_id' => 23,
                'sub_category_id' => 4,
            ),
            52 => 
            array (
                'product_id' => 24,
                'sub_category_id' => 3,
            ),
            53 => 
            array (
                'product_id' => 24,
                'sub_category_id' => 4,
            ),
            54 => 
            array (
                'product_id' => 25,
                'sub_category_id' => 3,
            ),
            55 => 
            array (
                'product_id' => 25,
                'sub_category_id' => 4,
            ),
            56 => 
            array (
                'product_id' => 26,
                'sub_category_id' => 3,
            ),
            57 => 
            array (
                'product_id' => 26,
                'sub_category_id' => 4,
            ),
            58 => 
            array (
                'product_id' => 27,
                'sub_category_id' => 3,
            ),
            59 => 
            array (
                'product_id' => 27,
                'sub_category_id' => 11,
            ),
            60 => 
            array (
                'product_id' => 27,
                'sub_category_id' => 4,
            ),
            61 => 
            array (
                'product_id' => 28,
                'sub_category_id' => 3,
            ),
            62 => 
            array (
                'product_id' => 28,
                'sub_category_id' => 6,
            ),
            63 => 
            array (
                'product_id' => 28,
                'sub_category_id' => 4,
            ),
            64 => 
            array (
                'product_id' => 29,
                'sub_category_id' => 3,
            ),
            65 => 
            array (
                'product_id' => 29,
                'sub_category_id' => 4,
            ),
            66 => 
            array (
                'product_id' => 30,
                'sub_category_id' => 3,
            ),
            67 => 
            array (
                'product_id' => 30,
                'sub_category_id' => 4,
            ),
            68 => 
            array (
                'product_id' => 31,
                'sub_category_id' => 4,
            ),
            69 => 
            array (
                'product_id' => 32,
                'sub_category_id' => 4,
            ),
            70 => 
            array (
                'product_id' => 33,
                'sub_category_id' => 4,
            ),
            71 => 
            array (
                'product_id' => 34,
                'sub_category_id' => 4,
            ),
            72 => 
            array (
                'product_id' => 35,
                'sub_category_id' => 4,
            ),
            73 => 
            array (
                'product_id' => 36,
                'sub_category_id' => 4,
            ),
            74 => 
            array (
                'product_id' => 37,
                'sub_category_id' => 4,
            ),
            75 => 
            array (
                'product_id' => 38,
                'sub_category_id' => 4,
            ),
            76 => 
            array (
                'product_id' => 39,
                'sub_category_id' => 4,
            ),
            77 => 
            array (
                'product_id' => 40,
                'sub_category_id' => 4,
            ),
            78 => 
            array (
                'product_id' => 41,
                'sub_category_id' => 10,
            ),
            79 => 
            array (
                'product_id' => 41,
                'sub_category_id' => 4,
            ),
            80 => 
            array (
                'product_id' => 42,
                'sub_category_id' => 10,
            ),
            81 => 
            array (
                'product_id' => 42,
                'sub_category_id' => 4,
            ),
            82 => 
            array (
                'product_id' => 43,
                'sub_category_id' => 10,
            ),
            83 => 
            array (
                'product_id' => 43,
                'sub_category_id' => 4,
            ),
            84 => 
            array (
                'product_id' => 44,
                'sub_category_id' => 4,
            ),
            85 => 
            array (
                'product_id' => 45,
                'sub_category_id' => 4,
            ),
            86 => 
            array (
                'product_id' => 46,
                'sub_category_id' => 4,
            ),
            87 => 
            array (
                'product_id' => 47,
                'sub_category_id' => 4,
            ),
            88 => 
            array (
                'product_id' => 48,
                'sub_category_id' => 12,
            ),
            89 => 
            array (
                'product_id' => 48,
                'sub_category_id' => 4,
            ),
            90 => 
            array (
                'product_id' => 49,
                'sub_category_id' => 12,
            ),
            91 => 
            array (
                'product_id' => 49,
                'sub_category_id' => 4,
            ),
            92 => 
            array (
                'product_id' => 50,
                'sub_category_id' => 4,
            ),
            93 => 
            array (
                'product_id' => 51,
                'sub_category_id' => 4,
            ),
            94 => 
            array (
                'product_id' => 52,
                'sub_category_id' => 4,
            ),
            95 => 
            array (
                'product_id' => 53,
                'sub_category_id' => 4,
            ),
            96 => 
            array (
                'product_id' => 54,
                'sub_category_id' => 4,
            ),
            97 => 
            array (
                'product_id' => 55,
                'sub_category_id' => 4,
            ),
            98 => 
            array (
                'product_id' => 56,
                'sub_category_id' => 4,
            ),
            99 => 
            array (
                'product_id' => 57,
                'sub_category_id' => 4,
            ),
            100 => 
            array (
                'product_id' => 58,
                'sub_category_id' => 4,
            ),
            101 => 
            array (
                'product_id' => 59,
                'sub_category_id' => 4,
            ),
            102 => 
            array (
                'product_id' => 60,
                'sub_category_id' => 4,
            ),
            103 => 
            array (
                'product_id' => 61,
                'sub_category_id' => 4,
            ),
            104 => 
            array (
                'product_id' => 62,
                'sub_category_id' => 4,
            ),
            105 => 
            array (
                'product_id' => 63,
                'sub_category_id' => 4,
            ),
            106 => 
            array (
                'product_id' => 64,
                'sub_category_id' => 4,
            ),
            107 => 
            array (
                'product_id' => 65,
                'sub_category_id' => 4,
            ),
            108 => 
            array (
                'product_id' => 66,
                'sub_category_id' => 4,
            ),
            109 => 
            array (
                'product_id' => 67,
                'sub_category_id' => 4,
            ),
            110 => 
            array (
                'product_id' => 68,
                'sub_category_id' => 4,
            ),
            111 => 
            array (
                'product_id' => 69,
                'sub_category_id' => 4,
            ),
            112 => 
            array (
                'product_id' => 70,
                'sub_category_id' => 4,
            ),
            113 => 
            array (
                'product_id' => 71,
                'sub_category_id' => 4,
            ),
            114 => 
            array (
                'product_id' => 72,
                'sub_category_id' => 4,
            ),
            115 => 
            array (
                'product_id' => 73,
                'sub_category_id' => 4,
            ),
            116 => 
            array (
                'product_id' => 74,
                'sub_category_id' => 4,
            ),
            117 => 
            array (
                'product_id' => 75,
                'sub_category_id' => 4,
            ),
            118 => 
            array (
                'product_id' => 76,
                'sub_category_id' => 4,
            ),
            119 => 
            array (
                'product_id' => 77,
                'sub_category_id' => 4,
            ),
            120 => 
            array (
                'product_id' => 78,
                'sub_category_id' => 4,
            ),
            121 => 
            array (
                'product_id' => 79,
                'sub_category_id' => 4,
            ),
            122 => 
            array (
                'product_id' => 80,
                'sub_category_id' => 4,
            ),
            123 => 
            array (
                'product_id' => 81,
                'sub_category_id' => 4,
            ),
            124 => 
            array (
                'product_id' => 82,
                'sub_category_id' => 4,
            ),
            125 => 
            array (
                'product_id' => 83,
                'sub_category_id' => 4,
            ),
            126 => 
            array (
                'product_id' => 84,
                'sub_category_id' => 4,
            ),
            127 => 
            array (
                'product_id' => 85,
                'sub_category_id' => 4,
            ),
            128 => 
            array (
                'product_id' => 86,
                'sub_category_id' => 4,
            ),
            129 => 
            array (
                'product_id' => 87,
                'sub_category_id' => 4,
            ),
            130 => 
            array (
                'product_id' => 88,
                'sub_category_id' => 4,
            ),
            131 => 
            array (
                'product_id' => 89,
                'sub_category_id' => 4,
            ),
            132 => 
            array (
                'product_id' => 90,
                'sub_category_id' => 4,
            ),
            133 => 
            array (
                'product_id' => 91,
                'sub_category_id' => 6,
            ),
            134 => 
            array (
                'product_id' => 91,
                'sub_category_id' => 10,
            ),
            135 => 
            array (
                'product_id' => 92,
                'sub_category_id' => 6,
            ),
            136 => 
            array (
                'product_id' => 92,
                'sub_category_id' => 10,
            ),
            137 => 
            array (
                'product_id' => 93,
                'sub_category_id' => 6,
            ),
            138 => 
            array (
                'product_id' => 93,
                'sub_category_id' => 10,
            ),
            139 => 
            array (
                'product_id' => 94,
                'sub_category_id' => 6,
            ),
            140 => 
            array (
                'product_id' => 95,
                'sub_category_id' => 6,
            ),
            141 => 
            array (
                'product_id' => 95,
                'sub_category_id' => 9,
            ),
            142 => 
            array (
                'product_id' => 96,
                'sub_category_id' => 6,
            ),
            143 => 
            array (
                'product_id' => 96,
                'sub_category_id' => 9,
            ),
            144 => 
            array (
                'product_id' => 97,
                'sub_category_id' => 6,
            ),
            145 => 
            array (
                'product_id' => 97,
                'sub_category_id' => 11,
            ),
            146 => 
            array (
                'product_id' => 98,
                'sub_category_id' => 6,
            ),
            147 => 
            array (
                'product_id' => 99,
                'sub_category_id' => 6,
            ),
            148 => 
            array (
                'product_id' => 100,
                'sub_category_id' => 6,
            ),
            149 => 
            array (
                'product_id' => 101,
                'sub_category_id' => 6,
            ),
            150 => 
            array (
                'product_id' => 102,
                'sub_category_id' => 6,
            ),
            151 => 
            array (
                'product_id' => 103,
                'sub_category_id' => 6,
            ),
            152 => 
            array (
                'product_id' => 104,
                'sub_category_id' => 6,
            ),
            153 => 
            array (
                'product_id' => 105,
                'sub_category_id' => 6,
            ),
            154 => 
            array (
                'product_id' => 106,
                'sub_category_id' => 6,
            ),
            155 => 
            array (
                'product_id' => 107,
                'sub_category_id' => 6,
            ),
            156 => 
            array (
                'product_id' => 108,
                'sub_category_id' => 6,
            ),
            157 => 
            array (
                'product_id' => 109,
                'sub_category_id' => 6,
            ),
            158 => 
            array (
                'product_id' => 110,
                'sub_category_id' => 6,
            ),
            159 => 
            array (
                'product_id' => 110,
                'sub_category_id' => 12,
            ),
            160 => 
            array (
                'product_id' => 111,
                'sub_category_id' => 6,
            ),
            161 => 
            array (
                'product_id' => 111,
                'sub_category_id' => 12,
            ),
            162 => 
            array (
                'product_id' => 112,
                'sub_category_id' => 6,
            ),
            163 => 
            array (
                'product_id' => 113,
                'sub_category_id' => 6,
            ),
            164 => 
            array (
                'product_id' => 114,
                'sub_category_id' => 6,
            ),
            165 => 
            array (
                'product_id' => 115,
                'sub_category_id' => 6,
            ),
            166 => 
            array (
                'product_id' => 116,
                'sub_category_id' => 6,
            ),
            167 => 
            array (
                'product_id' => 117,
                'sub_category_id' => 6,
            ),
            168 => 
            array (
                'product_id' => 118,
                'sub_category_id' => 6,
            ),
            169 => 
            array (
                'product_id' => 119,
                'sub_category_id' => 6,
            ),
            170 => 
            array (
                'product_id' => 120,
                'sub_category_id' => 6,
            ),
            171 => 
            array (
                'product_id' => 121,
                'sub_category_id' => 6,
            ),
            172 => 
            array (
                'product_id' => 122,
                'sub_category_id' => 6,
            ),
            173 => 
            array (
                'product_id' => 123,
                'sub_category_id' => 6,
            ),
            174 => 
            array (
                'product_id' => 124,
                'sub_category_id' => 6,
            ),
            175 => 
            array (
                'product_id' => 125,
                'sub_category_id' => 6,
            ),
            176 => 
            array (
                'product_id' => 126,
                'sub_category_id' => 6,
            ),
            177 => 
            array (
                'product_id' => 126,
                'sub_category_id' => 12,
            ),
            178 => 
            array (
                'product_id' => 127,
                'sub_category_id' => 6,
            ),
            179 => 
            array (
                'product_id' => 128,
                'sub_category_id' => 6,
            ),
            180 => 
            array (
                'product_id' => 129,
                'sub_category_id' => 6,
            ),
            181 => 
            array (
                'product_id' => 130,
                'sub_category_id' => 6,
            ),
            182 => 
            array (
                'product_id' => 130,
                'sub_category_id' => 11,
            ),
            183 => 
            array (
                'product_id' => 131,
                'sub_category_id' => 6,
            ),
            184 => 
            array (
                'product_id' => 131,
                'sub_category_id' => 9,
            ),
            185 => 
            array (
                'product_id' => 132,
                'sub_category_id' => 6,
            ),
            186 => 
            array (
                'product_id' => 133,
                'sub_category_id' => 6,
            ),
            187 => 
            array (
                'product_id' => 134,
                'sub_category_id' => 6,
            ),
            188 => 
            array (
                'product_id' => 135,
                'sub_category_id' => 6,
            ),
            189 => 
            array (
                'product_id' => 136,
                'sub_category_id' => 6,
            ),
            190 => 
            array (
                'product_id' => 137,
                'sub_category_id' => 6,
            ),
            191 => 
            array (
                'product_id' => 138,
                'sub_category_id' => 6,
            ),
            192 => 
            array (
                'product_id' => 139,
                'sub_category_id' => 6,
            ),
            193 => 
            array (
                'product_id' => 140,
                'sub_category_id' => 6,
            ),
            194 => 
            array (
                'product_id' => 141,
                'sub_category_id' => 6,
            ),
            195 => 
            array (
                'product_id' => 141,
                'sub_category_id' => 9,
            ),
            196 => 
            array (
                'product_id' => 142,
                'sub_category_id' => 6,
            ),
            197 => 
            array (
                'product_id' => 143,
                'sub_category_id' => 6,
            ),
            198 => 
            array (
                'product_id' => 143,
                'sub_category_id' => 9,
            ),
            199 => 
            array (
                'product_id' => 144,
                'sub_category_id' => 6,
            ),
            200 => 
            array (
                'product_id' => 145,
                'sub_category_id' => 6,
            ),
            201 => 
            array (
                'product_id' => 146,
                'sub_category_id' => 6,
            ),
            202 => 
            array (
                'product_id' => 147,
                'sub_category_id' => 6,
            ),
            203 => 
            array (
                'product_id' => 148,
                'sub_category_id' => 6,
            ),
            204 => 
            array (
                'product_id' => 149,
                'sub_category_id' => 6,
            ),
            205 => 
            array (
                'product_id' => 150,
                'sub_category_id' => 6,
            ),
            206 => 
            array (
                'product_id' => 151,
                'sub_category_id' => 5,
            ),
            207 => 
            array (
                'product_id' => 151,
                'sub_category_id' => 10,
            ),
            208 => 
            array (
                'product_id' => 152,
                'sub_category_id' => 5,
            ),
            209 => 
            array (
                'product_id' => 152,
                'sub_category_id' => 10,
            ),
            210 => 
            array (
                'product_id' => 153,
                'sub_category_id' => 5,
            ),
            211 => 
            array (
                'product_id' => 153,
                'sub_category_id' => 10,
            ),
            212 => 
            array (
                'product_id' => 154,
                'sub_category_id' => 5,
            ),
            213 => 
            array (
                'product_id' => 154,
                'sub_category_id' => 10,
            ),
            214 => 
            array (
                'product_id' => 155,
                'sub_category_id' => 5,
            ),
            215 => 
            array (
                'product_id' => 156,
                'sub_category_id' => 5,
            ),
            216 => 
            array (
                'product_id' => 156,
                'sub_category_id' => 12,
            ),
            217 => 
            array (
                'product_id' => 157,
                'sub_category_id' => 5,
            ),
            218 => 
            array (
                'product_id' => 158,
                'sub_category_id' => 5,
            ),
            219 => 
            array (
                'product_id' => 159,
                'sub_category_id' => 5,
            ),
            220 => 
            array (
                'product_id' => 160,
                'sub_category_id' => 5,
            ),
            221 => 
            array (
                'product_id' => 161,
                'sub_category_id' => 5,
            ),
            222 => 
            array (
                'product_id' => 162,
                'sub_category_id' => 5,
            ),
            223 => 
            array (
                'product_id' => 163,
                'sub_category_id' => 5,
            ),
            224 => 
            array (
                'product_id' => 164,
                'sub_category_id' => 5,
            ),
            225 => 
            array (
                'product_id' => 165,
                'sub_category_id' => 5,
            ),
            226 => 
            array (
                'product_id' => 166,
                'sub_category_id' => 5,
            ),
            227 => 
            array (
                'product_id' => 167,
                'sub_category_id' => 5,
            ),
            228 => 
            array (
                'product_id' => 168,
                'sub_category_id' => 5,
            ),
            229 => 
            array (
                'product_id' => 169,
                'sub_category_id' => 5,
            ),
            230 => 
            array (
                'product_id' => 170,
                'sub_category_id' => 5,
            ),
            231 => 
            array (
                'product_id' => 171,
                'sub_category_id' => 5,
            ),
            232 => 
            array (
                'product_id' => 172,
                'sub_category_id' => 5,
            ),
            233 => 
            array (
                'product_id' => 173,
                'sub_category_id' => 5,
            ),
            234 => 
            array (
                'product_id' => 174,
                'sub_category_id' => 5,
            ),
            235 => 
            array (
                'product_id' => 175,
                'sub_category_id' => 5,
            ),
            236 => 
            array (
                'product_id' => 176,
                'sub_category_id' => 5,
            ),
            237 => 
            array (
                'product_id' => 177,
                'sub_category_id' => 5,
            ),
            238 => 
            array (
                'product_id' => 178,
                'sub_category_id' => 5,
            ),
            239 => 
            array (
                'product_id' => 179,
                'sub_category_id' => 5,
            ),
            240 => 
            array (
                'product_id' => 180,
                'sub_category_id' => 5,
            ),
            241 => 
            array (
                'product_id' => 181,
                'sub_category_id' => 5,
            ),
            242 => 
            array (
                'product_id' => 182,
                'sub_category_id' => 5,
            ),
            243 => 
            array (
                'product_id' => 183,
                'sub_category_id' => 5,
            ),
            244 => 
            array (
                'product_id' => 184,
                'sub_category_id' => 5,
            ),
            245 => 
            array (
                'product_id' => 184,
                'sub_category_id' => 10,
            ),
            246 => 
            array (
                'product_id' => 185,
                'sub_category_id' => 5,
            ),
            247 => 
            array (
                'product_id' => 186,
                'sub_category_id' => 5,
            ),
            248 => 
            array (
                'product_id' => 187,
                'sub_category_id' => 5,
            ),
            249 => 
            array (
                'product_id' => 187,
                'sub_category_id' => 10,
            ),
            250 => 
            array (
                'product_id' => 188,
                'sub_category_id' => 5,
            ),
            251 => 
            array (
                'product_id' => 188,
                'sub_category_id' => 10,
            ),
            252 => 
            array (
                'product_id' => 189,
                'sub_category_id' => 5,
            ),
            253 => 
            array (
                'product_id' => 189,
                'sub_category_id' => 10,
            ),
            254 => 
            array (
                'product_id' => 190,
                'sub_category_id' => 5,
            ),
            255 => 
            array (
                'product_id' => 190,
                'sub_category_id' => 10,
            ),
            256 => 
            array (
                'product_id' => 191,
                'sub_category_id' => 5,
            ),
            257 => 
            array (
                'product_id' => 192,
                'sub_category_id' => 5,
            ),
            258 => 
            array (
                'product_id' => 193,
                'sub_category_id' => 5,
            ),
            259 => 
            array (
                'product_id' => 194,
                'sub_category_id' => 5,
            ),
            260 => 
            array (
                'product_id' => 195,
                'sub_category_id' => 5,
            ),
            261 => 
            array (
                'product_id' => 196,
                'sub_category_id' => 5,
            ),
            262 => 
            array (
                'product_id' => 197,
                'sub_category_id' => 5,
            ),
            263 => 
            array (
                'product_id' => 198,
                'sub_category_id' => 5,
            ),
            264 => 
            array (
                'product_id' => 199,
                'sub_category_id' => 5,
            ),
            265 => 
            array (
                'product_id' => 200,
                'sub_category_id' => 5,
            ),
            266 => 
            array (
                'product_id' => 201,
                'sub_category_id' => 5,
            ),
            267 => 
            array (
                'product_id' => 202,
                'sub_category_id' => 5,
            ),
            268 => 
            array (
                'product_id' => 203,
                'sub_category_id' => 5,
            ),
            269 => 
            array (
                'product_id' => 204,
                'sub_category_id' => 5,
            ),
            270 => 
            array (
                'product_id' => 205,
                'sub_category_id' => 5,
            ),
            271 => 
            array (
                'product_id' => 206,
                'sub_category_id' => 5,
            ),
            272 => 
            array (
                'product_id' => 207,
                'sub_category_id' => 5,
            ),
            273 => 
            array (
                'product_id' => 208,
                'sub_category_id' => 5,
            ),
            274 => 
            array (
                'product_id' => 209,
                'sub_category_id' => 5,
            ),
            275 => 
            array (
                'product_id' => 210,
                'sub_category_id' => 5,
            ),
            276 => 
            array (
                'product_id' => 211,
                'sub_category_id' => 7,
            ),
            277 => 
            array (
                'product_id' => 211,
                'sub_category_id' => 10,
            ),
            278 => 
            array (
                'product_id' => 212,
                'sub_category_id' => 7,
            ),
            279 => 
            array (
                'product_id' => 212,
                'sub_category_id' => 10,
            ),
            280 => 
            array (
                'product_id' => 213,
                'sub_category_id' => 7,
            ),
            281 => 
            array (
                'product_id' => 213,
                'sub_category_id' => 10,
            ),
            282 => 
            array (
                'product_id' => 214,
                'sub_category_id' => 7,
            ),
            283 => 
            array (
                'product_id' => 214,
                'sub_category_id' => 10,
            ),
            284 => 
            array (
                'product_id' => 215,
                'sub_category_id' => 7,
            ),
            285 => 
            array (
                'product_id' => 216,
                'sub_category_id' => 7,
            ),
            286 => 
            array (
                'product_id' => 217,
                'sub_category_id' => 7,
            ),
            287 => 
            array (
                'product_id' => 218,
                'sub_category_id' => 7,
            ),
            288 => 
            array (
                'product_id' => 219,
                'sub_category_id' => 7,
            ),
            289 => 
            array (
                'product_id' => 220,
                'sub_category_id' => 7,
            ),
            290 => 
            array (
                'product_id' => 221,
                'sub_category_id' => 7,
            ),
            291 => 
            array (
                'product_id' => 222,
                'sub_category_id' => 7,
            ),
            292 => 
            array (
                'product_id' => 223,
                'sub_category_id' => 7,
            ),
            293 => 
            array (
                'product_id' => 224,
                'sub_category_id' => 7,
            ),
            294 => 
            array (
                'product_id' => 225,
                'sub_category_id' => 7,
            ),
            295 => 
            array (
                'product_id' => 226,
                'sub_category_id' => 7,
            ),
            296 => 
            array (
                'product_id' => 227,
                'sub_category_id' => 7,
            ),
            297 => 
            array (
                'product_id' => 228,
                'sub_category_id' => 7,
            ),
            298 => 
            array (
                'product_id' => 229,
                'sub_category_id' => 7,
            ),
            299 => 
            array (
                'product_id' => 230,
                'sub_category_id' => 7,
            ),
            300 => 
            array (
                'product_id' => 231,
                'sub_category_id' => 7,
            ),
            301 => 
            array (
                'product_id' => 232,
                'sub_category_id' => 7,
            ),
            302 => 
            array (
                'product_id' => 233,
                'sub_category_id' => 7,
            ),
            303 => 
            array (
                'product_id' => 234,
                'sub_category_id' => 7,
            ),
            304 => 
            array (
                'product_id' => 235,
                'sub_category_id' => 7,
            ),
            305 => 
            array (
                'product_id' => 236,
                'sub_category_id' => 7,
            ),
            306 => 
            array (
                'product_id' => 237,
                'sub_category_id' => 7,
            ),
            307 => 
            array (
                'product_id' => 238,
                'sub_category_id' => 7,
            ),
            308 => 
            array (
                'product_id' => 239,
                'sub_category_id' => 7,
            ),
            309 => 
            array (
                'product_id' => 240,
                'sub_category_id' => 7,
            ),
            310 => 
            array (
                'product_id' => 241,
                'sub_category_id' => 7,
            ),
            311 => 
            array (
                'product_id' => 242,
                'sub_category_id' => 7,
            ),
            312 => 
            array (
                'product_id' => 243,
                'sub_category_id' => 7,
            ),
            313 => 
            array (
                'product_id' => 244,
                'sub_category_id' => 7,
            ),
            314 => 
            array (
                'product_id' => 245,
                'sub_category_id' => 7,
            ),
            315 => 
            array (
                'product_id' => 246,
                'sub_category_id' => 7,
            ),
            316 => 
            array (
                'product_id' => 247,
                'sub_category_id' => 7,
            ),
            317 => 
            array (
                'product_id' => 248,
                'sub_category_id' => 7,
            ),
            318 => 
            array (
                'product_id' => 249,
                'sub_category_id' => 7,
            ),
            319 => 
            array (
                'product_id' => 250,
                'sub_category_id' => 7,
            ),
            320 => 
            array (
                'product_id' => 251,
                'sub_category_id' => 7,
            ),
            321 => 
            array (
                'product_id' => 252,
                'sub_category_id' => 7,
            ),
            322 => 
            array (
                'product_id' => 253,
                'sub_category_id' => 7,
            ),
            323 => 
            array (
                'product_id' => 254,
                'sub_category_id' => 7,
            ),
            324 => 
            array (
                'product_id' => 255,
                'sub_category_id' => 7,
            ),
            325 => 
            array (
                'product_id' => 256,
                'sub_category_id' => 7,
            ),
            326 => 
            array (
                'product_id' => 257,
                'sub_category_id' => 7,
            ),
            327 => 
            array (
                'product_id' => 258,
                'sub_category_id' => 7,
            ),
            328 => 
            array (
                'product_id' => 259,
                'sub_category_id' => 7,
            ),
            329 => 
            array (
                'product_id' => 260,
                'sub_category_id' => 7,
            ),
            330 => 
            array (
                'product_id' => 261,
                'sub_category_id' => 7,
            ),
            331 => 
            array (
                'product_id' => 262,
                'sub_category_id' => 7,
            ),
            332 => 
            array (
                'product_id' => 263,
                'sub_category_id' => 7,
            ),
            333 => 
            array (
                'product_id' => 264,
                'sub_category_id' => 7,
            ),
            334 => 
            array (
                'product_id' => 265,
                'sub_category_id' => 7,
            ),
            335 => 
            array (
                'product_id' => 266,
                'sub_category_id' => 7,
            ),
            336 => 
            array (
                'product_id' => 266,
                'sub_category_id' => 9,
            ),
            337 => 
            array (
                'product_id' => 267,
                'sub_category_id' => 7,
            ),
            338 => 
            array (
                'product_id' => 268,
                'sub_category_id' => 7,
            ),
            339 => 
            array (
                'product_id' => 269,
                'sub_category_id' => 7,
            ),
            340 => 
            array (
                'product_id' => 269,
                'sub_category_id' => 12,
            ),
            341 => 
            array (
                'product_id' => 270,
                'sub_category_id' => 7,
            ),
            342 => 
            array (
                'product_id' => 270,
                'sub_category_id' => 12,
            ),
            343 => 
            array (
                'product_id' => 271,
                'sub_category_id' => 9,
            ),
            344 => 
            array (
                'product_id' => 272,
                'sub_category_id' => 9,
            ),
            345 => 
            array (
                'product_id' => 273,
                'sub_category_id' => 9,
            ),
            346 => 
            array (
                'product_id' => 274,
                'sub_category_id' => 9,
            ),
            347 => 
            array (
                'product_id' => 274,
                'sub_category_id' => 6,
            ),
            348 => 
            array (
                'product_id' => 275,
                'sub_category_id' => 9,
            ),
            349 => 
            array (
                'product_id' => 275,
                'sub_category_id' => 6,
            ),
            350 => 
            array (
                'product_id' => 276,
                'sub_category_id' => 9,
            ),
            351 => 
            array (
                'product_id' => 276,
                'sub_category_id' => 6,
            ),
            352 => 
            array (
                'product_id' => 277,
                'sub_category_id' => 9,
            ),
            353 => 
            array (
                'product_id' => 277,
                'sub_category_id' => 6,
            ),
            354 => 
            array (
                'product_id' => 278,
                'sub_category_id' => 9,
            ),
            355 => 
            array (
                'product_id' => 278,
                'sub_category_id' => 6,
            ),
            356 => 
            array (
                'product_id' => 279,
                'sub_category_id' => 9,
            ),
            357 => 
            array (
                'product_id' => 279,
                'sub_category_id' => 6,
            ),
            358 => 
            array (
                'product_id' => 280,
                'sub_category_id' => 9,
            ),
            359 => 
            array (
                'product_id' => 280,
                'sub_category_id' => 6,
            ),
            360 => 
            array (
                'product_id' => 281,
                'sub_category_id' => 9,
            ),
            361 => 
            array (
                'product_id' => 281,
                'sub_category_id' => 6,
            ),
            362 => 
            array (
                'product_id' => 282,
                'sub_category_id' => 9,
            ),
            363 => 
            array (
                'product_id' => 282,
                'sub_category_id' => 6,
            ),
            364 => 
            array (
                'product_id' => 283,
                'sub_category_id' => 9,
            ),
            365 => 
            array (
                'product_id' => 284,
                'sub_category_id' => 9,
            ),
            366 => 
            array (
                'product_id' => 285,
                'sub_category_id' => 9,
            ),
            367 => 
            array (
                'product_id' => 286,
                'sub_category_id' => 9,
            ),
            368 => 
            array (
                'product_id' => 287,
                'sub_category_id' => 9,
            ),
            369 => 
            array (
                'product_id' => 288,
                'sub_category_id' => 9,
            ),
            370 => 
            array (
                'product_id' => 289,
                'sub_category_id' => 9,
            ),
            371 => 
            array (
                'product_id' => 290,
                'sub_category_id' => 9,
            ),
            372 => 
            array (
                'product_id' => 291,
                'sub_category_id' => 9,
            ),
            373 => 
            array (
                'product_id' => 292,
                'sub_category_id' => 9,
            ),
            374 => 
            array (
                'product_id' => 292,
                'sub_category_id' => 6,
            ),
            375 => 
            array (
                'product_id' => 293,
                'sub_category_id' => 9,
            ),
            376 => 
            array (
                'product_id' => 294,
                'sub_category_id' => 9,
            ),
            377 => 
            array (
                'product_id' => 294,
                'sub_category_id' => 6,
            ),
            378 => 
            array (
                'product_id' => 295,
                'sub_category_id' => 9,
            ),
            379 => 
            array (
                'product_id' => 296,
                'sub_category_id' => 9,
            ),
            380 => 
            array (
                'product_id' => 297,
                'sub_category_id' => 9,
            ),
            381 => 
            array (
                'product_id' => 298,
                'sub_category_id' => 9,
            ),
            382 => 
            array (
                'product_id' => 299,
                'sub_category_id' => 9,
            ),
            383 => 
            array (
                'product_id' => 300,
                'sub_category_id' => 9,
            ),
            384 => 
            array (
                'product_id' => 301,
                'sub_category_id' => 9,
            ),
            385 => 
            array (
                'product_id' => 302,
                'sub_category_id' => 9,
            ),
            386 => 
            array (
                'product_id' => 303,
                'sub_category_id' => 9,
            ),
            387 => 
            array (
                'product_id' => 304,
                'sub_category_id' => 9,
            ),
            388 => 
            array (
                'product_id' => 304,
                'sub_category_id' => 6,
            ),
            389 => 
            array (
                'product_id' => 305,
                'sub_category_id' => 9,
            ),
            390 => 
            array (
                'product_id' => 305,
                'sub_category_id' => 6,
            ),
            391 => 
            array (
                'product_id' => 306,
                'sub_category_id' => 9,
            ),
            392 => 
            array (
                'product_id' => 307,
                'sub_category_id' => 9,
            ),
            393 => 
            array (
                'product_id' => 308,
                'sub_category_id' => 10,
            ),
            394 => 
            array (
                'product_id' => 309,
                'sub_category_id' => 10,
            ),
            395 => 
            array (
                'product_id' => 310,
                'sub_category_id' => 10,
            ),
            396 => 
            array (
                'product_id' => 310,
                'sub_category_id' => 6,
            ),
            397 => 
            array (
                'product_id' => 311,
                'sub_category_id' => 10,
            ),
            398 => 
            array (
                'product_id' => 311,
                'sub_category_id' => 6,
            ),
            399 => 
            array (
                'product_id' => 312,
                'sub_category_id' => 10,
            ),
            400 => 
            array (
                'product_id' => 313,
                'sub_category_id' => 10,
            ),
            401 => 
            array (
                'product_id' => 314,
                'sub_category_id' => 10,
            ),
            402 => 
            array (
                'product_id' => 314,
                'sub_category_id' => 6,
            ),
            403 => 
            array (
                'product_id' => 315,
                'sub_category_id' => 10,
            ),
            404 => 
            array (
                'product_id' => 316,
                'sub_category_id' => 10,
            ),
            405 => 
            array (
                'product_id' => 317,
                'sub_category_id' => 10,
            ),
            406 => 
            array (
                'product_id' => 318,
                'sub_category_id' => 10,
            ),
            407 => 
            array (
                'product_id' => 319,
                'sub_category_id' => 10,
            ),
            408 => 
            array (
                'product_id' => 320,
                'sub_category_id' => 10,
            ),
            409 => 
            array (
                'product_id' => 321,
                'sub_category_id' => 10,
            ),
            410 => 
            array (
                'product_id' => 322,
                'sub_category_id' => 10,
            ),
            411 => 
            array (
                'product_id' => 323,
                'sub_category_id' => 10,
            ),
            412 => 
            array (
                'product_id' => 324,
                'sub_category_id' => 10,
            ),
            413 => 
            array (
                'product_id' => 325,
                'sub_category_id' => 10,
            ),
            414 => 
            array (
                'product_id' => 326,
                'sub_category_id' => 10,
            ),
            415 => 
            array (
                'product_id' => 327,
                'sub_category_id' => 10,
            ),
            416 => 
            array (
                'product_id' => 328,
                'sub_category_id' => 10,
            ),
            417 => 
            array (
                'product_id' => 329,
                'sub_category_id' => 10,
            ),
            418 => 
            array (
                'product_id' => 330,
                'sub_category_id' => 10,
            ),
            419 => 
            array (
                'product_id' => 331,
                'sub_category_id' => 10,
            ),
            420 => 
            array (
                'product_id' => 332,
                'sub_category_id' => 10,
            ),
            421 => 
            array (
                'product_id' => 333,
                'sub_category_id' => 10,
            ),
            422 => 
            array (
                'product_id' => 334,
                'sub_category_id' => 10,
            ),
            423 => 
            array (
                'product_id' => 335,
                'sub_category_id' => 10,
            ),
            424 => 
            array (
                'product_id' => 336,
                'sub_category_id' => 10,
            ),
            425 => 
            array (
                'product_id' => 337,
                'sub_category_id' => 10,
            ),
            426 => 
            array (
                'product_id' => 338,
                'sub_category_id' => 10,
            ),
            427 => 
            array (
                'product_id' => 339,
                'sub_category_id' => 10,
            ),
            428 => 
            array (
                'product_id' => 340,
                'sub_category_id' => 10,
            ),
            429 => 
            array (
                'product_id' => 341,
                'sub_category_id' => 10,
            ),
            430 => 
            array (
                'product_id' => 342,
                'sub_category_id' => 11,
            ),
            431 => 
            array (
                'product_id' => 343,
                'sub_category_id' => 11,
            ),
            432 => 
            array (
                'product_id' => 343,
                'sub_category_id' => 6,
            ),
            433 => 
            array (
                'product_id' => 344,
                'sub_category_id' => 11,
            ),
            434 => 
            array (
                'product_id' => 344,
                'sub_category_id' => 6,
            ),
            435 => 
            array (
                'product_id' => 345,
                'sub_category_id' => 11,
            ),
            436 => 
            array (
                'product_id' => 346,
                'sub_category_id' => 11,
            ),
            437 => 
            array (
                'product_id' => 347,
                'sub_category_id' => 11,
            ),
            438 => 
            array (
                'product_id' => 348,
                'sub_category_id' => 11,
            ),
            439 => 
            array (
                'product_id' => 349,
                'sub_category_id' => 11,
            ),
            440 => 
            array (
                'product_id' => 350,
                'sub_category_id' => 11,
            ),
            441 => 
            array (
                'product_id' => 351,
                'sub_category_id' => 11,
            ),
            442 => 
            array (
                'product_id' => 352,
                'sub_category_id' => 11,
            ),
            443 => 
            array (
                'product_id' => 353,
                'sub_category_id' => 11,
            ),
            444 => 
            array (
                'product_id' => 354,
                'sub_category_id' => 11,
            ),
            445 => 
            array (
                'product_id' => 355,
                'sub_category_id' => 11,
            ),
            446 => 
            array (
                'product_id' => 356,
                'sub_category_id' => 11,
            ),
            447 => 
            array (
                'product_id' => 357,
                'sub_category_id' => 11,
            ),
            448 => 
            array (
                'product_id' => 358,
                'sub_category_id' => 11,
            ),
            449 => 
            array (
                'product_id' => 359,
                'sub_category_id' => 11,
            ),
            450 => 
            array (
                'product_id' => 360,
                'sub_category_id' => 11,
            ),
            451 => 
            array (
                'product_id' => 360,
                'sub_category_id' => 6,
            ),
            452 => 
            array (
                'product_id' => 361,
                'sub_category_id' => 11,
            ),
            453 => 
            array (
                'product_id' => 362,
                'sub_category_id' => 11,
            ),
            454 => 
            array (
                'product_id' => 363,
                'sub_category_id' => 12,
            ),
            455 => 
            array (
                'product_id' => 364,
                'sub_category_id' => 12,
            ),
            456 => 
            array (
                'product_id' => 365,
                'sub_category_id' => 12,
            ),
            457 => 
            array (
                'product_id' => 366,
                'sub_category_id' => 12,
            ),
            458 => 
            array (
                'product_id' => 366,
                'sub_category_id' => 6,
            ),
            459 => 
            array (
                'product_id' => 367,
                'sub_category_id' => 12,
            ),
            460 => 
            array (
                'product_id' => 368,
                'sub_category_id' => 12,
            ),
            461 => 
            array (
                'product_id' => 369,
                'sub_category_id' => 12,
            ),
            462 => 
            array (
                'product_id' => 369,
                'sub_category_id' => 6,
            ),
            463 => 
            array (
                'product_id' => 370,
                'sub_category_id' => 12,
            ),
            464 => 
            array (
                'product_id' => 371,
                'sub_category_id' => 12,
            ),
            465 => 
            array (
                'product_id' => 372,
                'sub_category_id' => 12,
            ),
            466 => 
            array (
                'product_id' => 373,
                'sub_category_id' => 12,
            ),
            467 => 
            array (
                'product_id' => 374,
                'sub_category_id' => 12,
            ),
            468 => 
            array (
                'product_id' => 375,
                'sub_category_id' => 12,
            ),
            469 => 
            array (
                'product_id' => 376,
                'sub_category_id' => 12,
            ),
            470 => 
            array (
                'product_id' => 377,
                'sub_category_id' => 12,
            ),
            471 => 
            array (
                'product_id' => 378,
                'sub_category_id' => 12,
            ),
            472 => 
            array (
                'product_id' => 378,
                'sub_category_id' => 6,
            ),
            473 => 
            array (
                'product_id' => 379,
                'sub_category_id' => 12,
            ),
            474 => 
            array (
                'product_id' => 380,
                'sub_category_id' => 12,
            ),
            475 => 
            array (
                'product_id' => 381,
                'sub_category_id' => 12,
            ),
            476 => 
            array (
                'product_id' => 382,
                'sub_category_id' => 12,
            ),
            477 => 
            array (
                'product_id' => 383,
                'sub_category_id' => 12,
            ),
            478 => 
            array (
                'product_id' => 384,
                'sub_category_id' => 15,
            ),
            479 => 
            array (
                'product_id' => 385,
                'sub_category_id' => 15,
            ),
            480 => 
            array (
                'product_id' => 386,
                'sub_category_id' => 15,
            ),
            481 => 
            array (
                'product_id' => 387,
                'sub_category_id' => 15,
            ),
            482 => 
            array (
                'product_id' => 388,
                'sub_category_id' => 15,
            ),
            483 => 
            array (
                'product_id' => 389,
                'sub_category_id' => 15,
            ),
            484 => 
            array (
                'product_id' => 390,
                'sub_category_id' => 15,
            ),
            485 => 
            array (
                'product_id' => 391,
                'sub_category_id' => 15,
            ),
            486 => 
            array (
                'product_id' => 392,
                'sub_category_id' => 21,
            ),
            487 => 
            array (
                'product_id' => 392,
                'sub_category_id' => 15,
            ),
            488 => 
            array (
                'product_id' => 393,
                'sub_category_id' => 15,
            ),
            489 => 
            array (
                'product_id' => 394,
                'sub_category_id' => 24,
            ),
            490 => 
            array (
                'product_id' => 394,
                'sub_category_id' => 15,
            ),
            491 => 
            array (
                'product_id' => 395,
                'sub_category_id' => 15,
            ),
            492 => 
            array (
                'product_id' => 396,
                'sub_category_id' => 22,
            ),
            493 => 
            array (
                'product_id' => 396,
                'sub_category_id' => 15,
            ),
            494 => 
            array (
                'product_id' => 397,
                'sub_category_id' => 21,
            ),
            495 => 
            array (
                'product_id' => 397,
                'sub_category_id' => 15,
            ),
            496 => 
            array (
                'product_id' => 398,
                'sub_category_id' => 21,
            ),
            497 => 
            array (
                'product_id' => 398,
                'sub_category_id' => 15,
            ),
            498 => 
            array (
                'product_id' => 399,
                'sub_category_id' => 23,
            ),
            499 => 
            array (
                'product_id' => 399,
                'sub_category_id' => 15,
            ),
        ));
        \DB::table('product_category')->insert(array (
            0 => 
            array (
                'product_id' => 400,
                'sub_category_id' => 15,
            ),
            1 => 
            array (
                'product_id' => 401,
                'sub_category_id' => 15,
            ),
            2 => 
            array (
                'product_id' => 402,
                'sub_category_id' => 15,
            ),
            3 => 
            array (
                'product_id' => 403,
                'sub_category_id' => 15,
            ),
            4 => 
            array (
                'product_id' => 404,
                'sub_category_id' => 15,
            ),
            5 => 
            array (
                'product_id' => 405,
                'sub_category_id' => 15,
            ),
            6 => 
            array (
                'product_id' => 406,
                'sub_category_id' => 15,
            ),
            7 => 
            array (
                'product_id' => 407,
                'sub_category_id' => 15,
            ),
            8 => 
            array (
                'product_id' => 408,
                'sub_category_id' => 21,
            ),
            9 => 
            array (
                'product_id' => 408,
                'sub_category_id' => 15,
            ),
            10 => 
            array (
                'product_id' => 409,
                'sub_category_id' => 21,
            ),
            11 => 
            array (
                'product_id' => 409,
                'sub_category_id' => 15,
            ),
            12 => 
            array (
                'product_id' => 410,
                'sub_category_id' => 24,
            ),
            13 => 
            array (
                'product_id' => 410,
                'sub_category_id' => 15,
            ),
            14 => 
            array (
                'product_id' => 411,
                'sub_category_id' => 23,
            ),
            15 => 
            array (
                'product_id' => 411,
                'sub_category_id' => 15,
            ),
            16 => 
            array (
                'product_id' => 412,
                'sub_category_id' => 15,
            ),
            17 => 
            array (
                'product_id' => 413,
                'sub_category_id' => 21,
            ),
            18 => 
            array (
                'product_id' => 413,
                'sub_category_id' => 15,
            ),
            19 => 
            array (
                'product_id' => 414,
                'sub_category_id' => 15,
            ),
            20 => 
            array (
                'product_id' => 415,
                'sub_category_id' => 22,
            ),
            21 => 
            array (
                'product_id' => 415,
                'sub_category_id' => 15,
            ),
            22 => 
            array (
                'product_id' => 416,
                'sub_category_id' => 22,
            ),
            23 => 
            array (
                'product_id' => 416,
                'sub_category_id' => 15,
            ),
            24 => 
            array (
                'product_id' => 417,
                'sub_category_id' => 22,
            ),
            25 => 
            array (
                'product_id' => 417,
                'sub_category_id' => 15,
            ),
            26 => 
            array (
                'product_id' => 418,
                'sub_category_id' => 22,
            ),
            27 => 
            array (
                'product_id' => 418,
                'sub_category_id' => 15,
            ),
            28 => 
            array (
                'product_id' => 419,
                'sub_category_id' => 15,
            ),
            29 => 
            array (
                'product_id' => 420,
                'sub_category_id' => 15,
            ),
            30 => 
            array (
                'product_id' => 421,
                'sub_category_id' => 15,
            ),
            31 => 
            array (
                'product_id' => 422,
                'sub_category_id' => 15,
            ),
            32 => 
            array (
                'product_id' => 423,
                'sub_category_id' => 15,
            ),
            33 => 
            array (
                'product_id' => 424,
                'sub_category_id' => 15,
            ),
            34 => 
            array (
                'product_id' => 425,
                'sub_category_id' => 15,
            ),
            35 => 
            array (
                'product_id' => 426,
                'sub_category_id' => 23,
            ),
            36 => 
            array (
                'product_id' => 426,
                'sub_category_id' => 15,
            ),
            37 => 
            array (
                'product_id' => 427,
                'sub_category_id' => 23,
            ),
            38 => 
            array (
                'product_id' => 427,
                'sub_category_id' => 15,
            ),
            39 => 
            array (
                'product_id' => 428,
                'sub_category_id' => 23,
            ),
            40 => 
            array (
                'product_id' => 428,
                'sub_category_id' => 15,
            ),
            41 => 
            array (
                'product_id' => 429,
                'sub_category_id' => 23,
            ),
            42 => 
            array (
                'product_id' => 429,
                'sub_category_id' => 15,
            ),
            43 => 
            array (
                'product_id' => 430,
                'sub_category_id' => 23,
            ),
            44 => 
            array (
                'product_id' => 430,
                'sub_category_id' => 15,
            ),
            45 => 
            array (
                'product_id' => 431,
                'sub_category_id' => 23,
            ),
            46 => 
            array (
                'product_id' => 431,
                'sub_category_id' => 15,
            ),
            47 => 
            array (
                'product_id' => 432,
                'sub_category_id' => 15,
            ),
            48 => 
            array (
                'product_id' => 433,
                'sub_category_id' => 15,
            ),
            49 => 
            array (
                'product_id' => 434,
                'sub_category_id' => 15,
            ),
            50 => 
            array (
                'product_id' => 435,
                'sub_category_id' => 15,
            ),
            51 => 
            array (
                'product_id' => 436,
                'sub_category_id' => 15,
            ),
            52 => 
            array (
                'product_id' => 437,
                'sub_category_id' => 15,
            ),
            53 => 
            array (
                'product_id' => 438,
                'sub_category_id' => 15,
            ),
            54 => 
            array (
                'product_id' => 439,
                'sub_category_id' => 15,
            ),
            55 => 
            array (
                'product_id' => 440,
                'sub_category_id' => 15,
            ),
            56 => 
            array (
                'product_id' => 441,
                'sub_category_id' => 15,
            ),
            57 => 
            array (
                'product_id' => 442,
                'sub_category_id' => 15,
            ),
            58 => 
            array (
                'product_id' => 443,
                'sub_category_id' => 15,
            ),
            59 => 
            array (
                'product_id' => 444,
                'sub_category_id' => 16,
            ),
            60 => 
            array (
                'product_id' => 444,
                'sub_category_id' => 21,
            ),
            61 => 
            array (
                'product_id' => 445,
                'sub_category_id' => 16,
            ),
            62 => 
            array (
                'product_id' => 445,
                'sub_category_id' => 21,
            ),
            63 => 
            array (
                'product_id' => 446,
                'sub_category_id' => 16,
            ),
            64 => 
            array (
                'product_id' => 446,
                'sub_category_id' => 21,
            ),
            65 => 
            array (
                'product_id' => 447,
                'sub_category_id' => 16,
            ),
            66 => 
            array (
                'product_id' => 447,
                'sub_category_id' => 21,
            ),
            67 => 
            array (
                'product_id' => 448,
                'sub_category_id' => 16,
            ),
            68 => 
            array (
                'product_id' => 449,
                'sub_category_id' => 16,
            ),
            69 => 
            array (
                'product_id' => 450,
                'sub_category_id' => 16,
            ),
            70 => 
            array (
                'product_id' => 451,
                'sub_category_id' => 16,
            ),
            71 => 
            array (
                'product_id' => 452,
                'sub_category_id' => 16,
            ),
            72 => 
            array (
                'product_id' => 453,
                'sub_category_id' => 16,
            ),
            73 => 
            array (
                'product_id' => 454,
                'sub_category_id' => 16,
            ),
            74 => 
            array (
                'product_id' => 454,
                'sub_category_id' => 21,
            ),
            75 => 
            array (
                'product_id' => 455,
                'sub_category_id' => 16,
            ),
            76 => 
            array (
                'product_id' => 455,
                'sub_category_id' => 22,
            ),
            77 => 
            array (
                'product_id' => 456,
                'sub_category_id' => 16,
            ),
            78 => 
            array (
                'product_id' => 457,
                'sub_category_id' => 16,
            ),
            79 => 
            array (
                'product_id' => 457,
                'sub_category_id' => 24,
            ),
            80 => 
            array (
                'product_id' => 458,
                'sub_category_id' => 16,
            ),
            81 => 
            array (
                'product_id' => 458,
                'sub_category_id' => 24,
            ),
            82 => 
            array (
                'product_id' => 459,
                'sub_category_id' => 16,
            ),
            83 => 
            array (
                'product_id' => 459,
                'sub_category_id' => 24,
            ),
            84 => 
            array (
                'product_id' => 460,
                'sub_category_id' => 16,
            ),
            85 => 
            array (
                'product_id' => 460,
                'sub_category_id' => 22,
            ),
            86 => 
            array (
                'product_id' => 461,
                'sub_category_id' => 16,
            ),
            87 => 
            array (
                'product_id' => 461,
                'sub_category_id' => 22,
            ),
            88 => 
            array (
                'product_id' => 462,
                'sub_category_id' => 16,
            ),
            89 => 
            array (
                'product_id' => 462,
                'sub_category_id' => 22,
            ),
            90 => 
            array (
                'product_id' => 463,
                'sub_category_id' => 16,
            ),
            91 => 
            array (
                'product_id' => 464,
                'sub_category_id' => 16,
            ),
            92 => 
            array (
                'product_id' => 465,
                'sub_category_id' => 16,
            ),
            93 => 
            array (
                'product_id' => 466,
                'sub_category_id' => 16,
            ),
            94 => 
            array (
                'product_id' => 467,
                'sub_category_id' => 16,
            ),
            95 => 
            array (
                'product_id' => 468,
                'sub_category_id' => 16,
            ),
            96 => 
            array (
                'product_id' => 469,
                'sub_category_id' => 16,
            ),
            97 => 
            array (
                'product_id' => 470,
                'sub_category_id' => 16,
            ),
            98 => 
            array (
                'product_id' => 471,
                'sub_category_id' => 16,
            ),
            99 => 
            array (
                'product_id' => 472,
                'sub_category_id' => 16,
            ),
            100 => 
            array (
                'product_id' => 473,
                'sub_category_id' => 16,
            ),
            101 => 
            array (
                'product_id' => 474,
                'sub_category_id' => 16,
            ),
            102 => 
            array (
                'product_id' => 475,
                'sub_category_id' => 16,
            ),
            103 => 
            array (
                'product_id' => 476,
                'sub_category_id' => 16,
            ),
            104 => 
            array (
                'product_id' => 477,
                'sub_category_id' => 16,
            ),
            105 => 
            array (
                'product_id' => 478,
                'sub_category_id' => 16,
            ),
            106 => 
            array (
                'product_id' => 478,
                'sub_category_id' => 22,
            ),
            107 => 
            array (
                'product_id' => 479,
                'sub_category_id' => 16,
            ),
            108 => 
            array (
                'product_id' => 480,
                'sub_category_id' => 16,
            ),
            109 => 
            array (
                'product_id' => 480,
                'sub_category_id' => 21,
            ),
            110 => 
            array (
                'product_id' => 481,
                'sub_category_id' => 16,
            ),
            111 => 
            array (
                'product_id' => 482,
                'sub_category_id' => 16,
            ),
            112 => 
            array (
                'product_id' => 482,
                'sub_category_id' => 24,
            ),
            113 => 
            array (
                'product_id' => 483,
                'sub_category_id' => 16,
            ),
            114 => 
            array (
                'product_id' => 483,
                'sub_category_id' => 22,
            ),
            115 => 
            array (
                'product_id' => 484,
                'sub_category_id' => 16,
            ),
            116 => 
            array (
                'product_id' => 484,
                'sub_category_id' => 24,
            ),
            117 => 
            array (
                'product_id' => 485,
                'sub_category_id' => 16,
            ),
            118 => 
            array (
                'product_id' => 486,
                'sub_category_id' => 16,
            ),
            119 => 
            array (
                'product_id' => 487,
                'sub_category_id' => 16,
            ),
            120 => 
            array (
                'product_id' => 488,
                'sub_category_id' => 16,
            ),
            121 => 
            array (
                'product_id' => 489,
                'sub_category_id' => 16,
            ),
            122 => 
            array (
                'product_id' => 490,
                'sub_category_id' => 16,
            ),
            123 => 
            array (
                'product_id' => 491,
                'sub_category_id' => 16,
            ),
            124 => 
            array (
                'product_id' => 492,
                'sub_category_id' => 16,
            ),
            125 => 
            array (
                'product_id' => 493,
                'sub_category_id' => 16,
            ),
            126 => 
            array (
                'product_id' => 494,
                'sub_category_id' => 16,
            ),
            127 => 
            array (
                'product_id' => 495,
                'sub_category_id' => 16,
            ),
            128 => 
            array (
                'product_id' => 496,
                'sub_category_id' => 16,
            ),
            129 => 
            array (
                'product_id' => 497,
                'sub_category_id' => 16,
            ),
            130 => 
            array (
                'product_id' => 498,
                'sub_category_id' => 16,
            ),
            131 => 
            array (
                'product_id' => 499,
                'sub_category_id' => 16,
            ),
            132 => 
            array (
                'product_id' => 500,
                'sub_category_id' => 16,
            ),
            133 => 
            array (
                'product_id' => 501,
                'sub_category_id' => 16,
            ),
            134 => 
            array (
                'product_id' => 502,
                'sub_category_id' => 16,
            ),
            135 => 
            array (
                'product_id' => 503,
                'sub_category_id' => 16,
            ),
            136 => 
            array (
                'product_id' => 504,
                'sub_category_id' => 17,
            ),
            137 => 
            array (
                'product_id' => 505,
                'sub_category_id' => 17,
            ),
            138 => 
            array (
                'product_id' => 506,
                'sub_category_id' => 17,
            ),
            139 => 
            array (
                'product_id' => 507,
                'sub_category_id' => 17,
            ),
            140 => 
            array (
                'product_id' => 508,
                'sub_category_id' => 17,
            ),
            141 => 
            array (
                'product_id' => 509,
                'sub_category_id' => 17,
            ),
            142 => 
            array (
                'product_id' => 510,
                'sub_category_id' => 17,
            ),
            143 => 
            array (
                'product_id' => 511,
                'sub_category_id' => 17,
            ),
            144 => 
            array (
                'product_id' => 512,
                'sub_category_id' => 17,
            ),
            145 => 
            array (
                'product_id' => 513,
                'sub_category_id' => 17,
            ),
            146 => 
            array (
                'product_id' => 514,
                'sub_category_id' => 17,
            ),
            147 => 
            array (
                'product_id' => 515,
                'sub_category_id' => 17,
            ),
            148 => 
            array (
                'product_id' => 516,
                'sub_category_id' => 17,
            ),
            149 => 
            array (
                'product_id' => 517,
                'sub_category_id' => 17,
            ),
            150 => 
            array (
                'product_id' => 518,
                'sub_category_id' => 17,
            ),
            151 => 
            array (
                'product_id' => 519,
                'sub_category_id' => 17,
            ),
            152 => 
            array (
                'product_id' => 520,
                'sub_category_id' => 17,
            ),
            153 => 
            array (
                'product_id' => 521,
                'sub_category_id' => 17,
            ),
            154 => 
            array (
                'product_id' => 522,
                'sub_category_id' => 17,
            ),
            155 => 
            array (
                'product_id' => 523,
                'sub_category_id' => 17,
            ),
            156 => 
            array (
                'product_id' => 524,
                'sub_category_id' => 17,
            ),
            157 => 
            array (
                'product_id' => 525,
                'sub_category_id' => 17,
            ),
            158 => 
            array (
                'product_id' => 526,
                'sub_category_id' => 17,
            ),
            159 => 
            array (
                'product_id' => 527,
                'sub_category_id' => 17,
            ),
            160 => 
            array (
                'product_id' => 528,
                'sub_category_id' => 17,
            ),
            161 => 
            array (
                'product_id' => 529,
                'sub_category_id' => 17,
            ),
            162 => 
            array (
                'product_id' => 530,
                'sub_category_id' => 17,
            ),
            163 => 
            array (
                'product_id' => 531,
                'sub_category_id' => 17,
            ),
            164 => 
            array (
                'product_id' => 532,
                'sub_category_id' => 17,
            ),
            165 => 
            array (
                'product_id' => 533,
                'sub_category_id' => 17,
            ),
            166 => 
            array (
                'product_id' => 534,
                'sub_category_id' => 17,
            ),
            167 => 
            array (
                'product_id' => 535,
                'sub_category_id' => 17,
            ),
            168 => 
            array (
                'product_id' => 536,
                'sub_category_id' => 17,
            ),
            169 => 
            array (
                'product_id' => 537,
                'sub_category_id' => 17,
            ),
            170 => 
            array (
                'product_id' => 538,
                'sub_category_id' => 17,
            ),
            171 => 
            array (
                'product_id' => 539,
                'sub_category_id' => 17,
            ),
            172 => 
            array (
                'product_id' => 540,
                'sub_category_id' => 17,
            ),
            173 => 
            array (
                'product_id' => 541,
                'sub_category_id' => 17,
            ),
            174 => 
            array (
                'product_id' => 542,
                'sub_category_id' => 17,
            ),
            175 => 
            array (
                'product_id' => 543,
                'sub_category_id' => 17,
            ),
            176 => 
            array (
                'product_id' => 544,
                'sub_category_id' => 17,
            ),
            177 => 
            array (
                'product_id' => 545,
                'sub_category_id' => 17,
            ),
            178 => 
            array (
                'product_id' => 546,
                'sub_category_id' => 17,
            ),
            179 => 
            array (
                'product_id' => 547,
                'sub_category_id' => 17,
            ),
            180 => 
            array (
                'product_id' => 548,
                'sub_category_id' => 17,
            ),
            181 => 
            array (
                'product_id' => 549,
                'sub_category_id' => 17,
            ),
            182 => 
            array (
                'product_id' => 550,
                'sub_category_id' => 17,
            ),
            183 => 
            array (
                'product_id' => 551,
                'sub_category_id' => 17,
            ),
            184 => 
            array (
                'product_id' => 552,
                'sub_category_id' => 17,
            ),
            185 => 
            array (
                'product_id' => 553,
                'sub_category_id' => 17,
            ),
            186 => 
            array (
                'product_id' => 554,
                'sub_category_id' => 17,
            ),
            187 => 
            array (
                'product_id' => 555,
                'sub_category_id' => 17,
            ),
            188 => 
            array (
                'product_id' => 556,
                'sub_category_id' => 17,
            ),
            189 => 
            array (
                'product_id' => 557,
                'sub_category_id' => 17,
            ),
            190 => 
            array (
                'product_id' => 558,
                'sub_category_id' => 17,
            ),
            191 => 
            array (
                'product_id' => 559,
                'sub_category_id' => 17,
            ),
            192 => 
            array (
                'product_id' => 560,
                'sub_category_id' => 17,
            ),
            193 => 
            array (
                'product_id' => 561,
                'sub_category_id' => 17,
            ),
            194 => 
            array (
                'product_id' => 562,
                'sub_category_id' => 17,
            ),
            195 => 
            array (
                'product_id' => 563,
                'sub_category_id' => 17,
            ),
            196 => 
            array (
                'product_id' => 564,
                'sub_category_id' => 18,
            ),
            197 => 
            array (
                'product_id' => 565,
                'sub_category_id' => 18,
            ),
            198 => 
            array (
                'product_id' => 566,
                'sub_category_id' => 18,
            ),
            199 => 
            array (
                'product_id' => 567,
                'sub_category_id' => 18,
            ),
            200 => 
            array (
                'product_id' => 568,
                'sub_category_id' => 18,
            ),
            201 => 
            array (
                'product_id' => 569,
                'sub_category_id' => 18,
            ),
            202 => 
            array (
                'product_id' => 570,
                'sub_category_id' => 18,
            ),
            203 => 
            array (
                'product_id' => 571,
                'sub_category_id' => 18,
            ),
            204 => 
            array (
                'product_id' => 572,
                'sub_category_id' => 18,
            ),
            205 => 
            array (
                'product_id' => 572,
                'sub_category_id' => 23,
            ),
            206 => 
            array (
                'product_id' => 573,
                'sub_category_id' => 18,
            ),
            207 => 
            array (
                'product_id' => 573,
                'sub_category_id' => 23,
            ),
            208 => 
            array (
                'product_id' => 574,
                'sub_category_id' => 18,
            ),
            209 => 
            array (
                'product_id' => 574,
                'sub_category_id' => 24,
            ),
            210 => 
            array (
                'product_id' => 575,
                'sub_category_id' => 18,
            ),
            211 => 
            array (
                'product_id' => 575,
                'sub_category_id' => 24,
            ),
            212 => 
            array (
                'product_id' => 576,
                'sub_category_id' => 18,
            ),
            213 => 
            array (
                'product_id' => 576,
                'sub_category_id' => 24,
            ),
            214 => 
            array (
                'product_id' => 577,
                'sub_category_id' => 18,
            ),
            215 => 
            array (
                'product_id' => 577,
                'sub_category_id' => 24,
            ),
            216 => 
            array (
                'product_id' => 578,
                'sub_category_id' => 18,
            ),
            217 => 
            array (
                'product_id' => 578,
                'sub_category_id' => 24,
            ),
            218 => 
            array (
                'product_id' => 579,
                'sub_category_id' => 18,
            ),
            219 => 
            array (
                'product_id' => 580,
                'sub_category_id' => 18,
            ),
            220 => 
            array (
                'product_id' => 581,
                'sub_category_id' => 18,
            ),
            221 => 
            array (
                'product_id' => 581,
                'sub_category_id' => 23,
            ),
            222 => 
            array (
                'product_id' => 582,
                'sub_category_id' => 18,
            ),
            223 => 
            array (
                'product_id' => 582,
                'sub_category_id' => 23,
            ),
            224 => 
            array (
                'product_id' => 583,
                'sub_category_id' => 18,
            ),
            225 => 
            array (
                'product_id' => 583,
                'sub_category_id' => 23,
            ),
            226 => 
            array (
                'product_id' => 584,
                'sub_category_id' => 18,
            ),
            227 => 
            array (
                'product_id' => 584,
                'sub_category_id' => 23,
            ),
            228 => 
            array (
                'product_id' => 585,
                'sub_category_id' => 18,
            ),
            229 => 
            array (
                'product_id' => 585,
                'sub_category_id' => 23,
            ),
            230 => 
            array (
                'product_id' => 586,
                'sub_category_id' => 18,
            ),
            231 => 
            array (
                'product_id' => 587,
                'sub_category_id' => 18,
            ),
            232 => 
            array (
                'product_id' => 588,
                'sub_category_id' => 18,
            ),
            233 => 
            array (
                'product_id' => 589,
                'sub_category_id' => 18,
            ),
            234 => 
            array (
                'product_id' => 589,
                'sub_category_id' => 23,
            ),
            235 => 
            array (
                'product_id' => 590,
                'sub_category_id' => 18,
            ),
            236 => 
            array (
                'product_id' => 590,
                'sub_category_id' => 23,
            ),
            237 => 
            array (
                'product_id' => 591,
                'sub_category_id' => 18,
            ),
            238 => 
            array (
                'product_id' => 591,
                'sub_category_id' => 23,
            ),
            239 => 
            array (
                'product_id' => 592,
                'sub_category_id' => 18,
            ),
            240 => 
            array (
                'product_id' => 593,
                'sub_category_id' => 18,
            ),
            241 => 
            array (
                'product_id' => 594,
                'sub_category_id' => 18,
            ),
            242 => 
            array (
                'product_id' => 594,
                'sub_category_id' => 22,
            ),
            243 => 
            array (
                'product_id' => 595,
                'sub_category_id' => 18,
            ),
            244 => 
            array (
                'product_id' => 596,
                'sub_category_id' => 18,
            ),
            245 => 
            array (
                'product_id' => 596,
                'sub_category_id' => 22,
            ),
            246 => 
            array (
                'product_id' => 597,
                'sub_category_id' => 18,
            ),
            247 => 
            array (
                'product_id' => 598,
                'sub_category_id' => 18,
            ),
            248 => 
            array (
                'product_id' => 598,
                'sub_category_id' => 23,
            ),
            249 => 
            array (
                'product_id' => 599,
                'sub_category_id' => 21,
            ),
            250 => 
            array (
                'product_id' => 600,
                'sub_category_id' => 21,
            ),
            251 => 
            array (
                'product_id' => 601,
                'sub_category_id' => 21,
            ),
            252 => 
            array (
                'product_id' => 602,
                'sub_category_id' => 21,
            ),
            253 => 
            array (
                'product_id' => 603,
                'sub_category_id' => 21,
            ),
            254 => 
            array (
                'product_id' => 604,
                'sub_category_id' => 21,
            ),
            255 => 
            array (
                'product_id' => 605,
                'sub_category_id' => 21,
            ),
            256 => 
            array (
                'product_id' => 606,
                'sub_category_id' => 21,
            ),
            257 => 
            array (
                'product_id' => 607,
                'sub_category_id' => 21,
            ),
            258 => 
            array (
                'product_id' => 608,
                'sub_category_id' => 21,
            ),
            259 => 
            array (
                'product_id' => 609,
                'sub_category_id' => 21,
            ),
            260 => 
            array (
                'product_id' => 610,
                'sub_category_id' => 21,
            ),
            261 => 
            array (
                'product_id' => 611,
                'sub_category_id' => 21,
            ),
            262 => 
            array (
                'product_id' => 612,
                'sub_category_id' => 21,
            ),
            263 => 
            array (
                'product_id' => 613,
                'sub_category_id' => 21,
            ),
            264 => 
            array (
                'product_id' => 614,
                'sub_category_id' => 21,
            ),
            265 => 
            array (
                'product_id' => 615,
                'sub_category_id' => 21,
            ),
            266 => 
            array (
                'product_id' => 616,
                'sub_category_id' => 21,
            ),
            267 => 
            array (
                'product_id' => 617,
                'sub_category_id' => 21,
            ),
            268 => 
            array (
                'product_id' => 618,
                'sub_category_id' => 21,
            ),
            269 => 
            array (
                'product_id' => 619,
                'sub_category_id' => 21,
            ),
            270 => 
            array (
                'product_id' => 620,
                'sub_category_id' => 22,
            ),
            271 => 
            array (
                'product_id' => 621,
                'sub_category_id' => 22,
            ),
            272 => 
            array (
                'product_id' => 622,
                'sub_category_id' => 22,
            ),
            273 => 
            array (
                'product_id' => 623,
                'sub_category_id' => 22,
            ),
            274 => 
            array (
                'product_id' => 624,
                'sub_category_id' => 22,
            ),
            275 => 
            array (
                'product_id' => 625,
                'sub_category_id' => 22,
            ),
            276 => 
            array (
                'product_id' => 626,
                'sub_category_id' => 22,
            ),
            277 => 
            array (
                'product_id' => 627,
                'sub_category_id' => 22,
            ),
            278 => 
            array (
                'product_id' => 628,
                'sub_category_id' => 22,
            ),
            279 => 
            array (
                'product_id' => 629,
                'sub_category_id' => 22,
            ),
            280 => 
            array (
                'product_id' => 629,
                'sub_category_id' => 18,
            ),
            281 => 
            array (
                'product_id' => 630,
                'sub_category_id' => 22,
            ),
            282 => 
            array (
                'product_id' => 630,
                'sub_category_id' => 18,
            ),
            283 => 
            array (
                'product_id' => 631,
                'sub_category_id' => 22,
            ),
            284 => 
            array (
                'product_id' => 631,
                'sub_category_id' => 18,
            ),
            285 => 
            array (
                'product_id' => 632,
                'sub_category_id' => 22,
            ),
            286 => 
            array (
                'product_id' => 633,
                'sub_category_id' => 22,
            ),
            287 => 
            array (
                'product_id' => 634,
                'sub_category_id' => 22,
            ),
            288 => 
            array (
                'product_id' => 635,
                'sub_category_id' => 22,
            ),
            289 => 
            array (
                'product_id' => 636,
                'sub_category_id' => 22,
            ),
            290 => 
            array (
                'product_id' => 637,
                'sub_category_id' => 22,
            ),
            291 => 
            array (
                'product_id' => 638,
                'sub_category_id' => 22,
            ),
            292 => 
            array (
                'product_id' => 639,
                'sub_category_id' => 22,
            ),
            293 => 
            array (
                'product_id' => 640,
                'sub_category_id' => 22,
            ),
            294 => 
            array (
                'product_id' => 641,
                'sub_category_id' => 22,
            ),
            295 => 
            array (
                'product_id' => 642,
                'sub_category_id' => 22,
            ),
            296 => 
            array (
                'product_id' => 643,
                'sub_category_id' => 22,
            ),
            297 => 
            array (
                'product_id' => 644,
                'sub_category_id' => 22,
            ),
            298 => 
            array (
                'product_id' => 645,
                'sub_category_id' => 22,
            ),
            299 => 
            array (
                'product_id' => 646,
                'sub_category_id' => 22,
            ),
            300 => 
            array (
                'product_id' => 647,
                'sub_category_id' => 22,
            ),
            301 => 
            array (
                'product_id' => 648,
                'sub_category_id' => 22,
            ),
            302 => 
            array (
                'product_id' => 649,
                'sub_category_id' => 22,
            ),
            303 => 
            array (
                'product_id' => 650,
                'sub_category_id' => 22,
            ),
            304 => 
            array (
                'product_id' => 651,
                'sub_category_id' => 22,
            ),
            305 => 
            array (
                'product_id' => 652,
                'sub_category_id' => 22,
            ),
            306 => 
            array (
                'product_id' => 653,
                'sub_category_id' => 22,
            ),
            307 => 
            array (
                'product_id' => 654,
                'sub_category_id' => 22,
            ),
            308 => 
            array (
                'product_id' => 655,
                'sub_category_id' => 22,
            ),
            309 => 
            array (
                'product_id' => 656,
                'sub_category_id' => 22,
            ),
            310 => 
            array (
                'product_id' => 657,
                'sub_category_id' => 22,
            ),
            311 => 
            array (
                'product_id' => 658,
                'sub_category_id' => 22,
            ),
            312 => 
            array (
                'product_id' => 659,
                'sub_category_id' => 22,
            ),
            313 => 
            array (
                'product_id' => 660,
                'sub_category_id' => 22,
            ),
            314 => 
            array (
                'product_id' => 661,
                'sub_category_id' => 22,
            ),
            315 => 
            array (
                'product_id' => 662,
                'sub_category_id' => 22,
            ),
            316 => 
            array (
                'product_id' => 663,
                'sub_category_id' => 22,
            ),
            317 => 
            array (
                'product_id' => 664,
                'sub_category_id' => 22,
            ),
            318 => 
            array (
                'product_id' => 665,
                'sub_category_id' => 22,
            ),
            319 => 
            array (
                'product_id' => 666,
                'sub_category_id' => 22,
            ),
            320 => 
            array (
                'product_id' => 667,
                'sub_category_id' => 22,
            ),
            321 => 
            array (
                'product_id' => 668,
                'sub_category_id' => 22,
            ),
            322 => 
            array (
                'product_id' => 669,
                'sub_category_id' => 22,
            ),
            323 => 
            array (
                'product_id' => 670,
                'sub_category_id' => 22,
            ),
            324 => 
            array (
                'product_id' => 671,
                'sub_category_id' => 22,
            ),
            325 => 
            array (
                'product_id' => 672,
                'sub_category_id' => 22,
            ),
            326 => 
            array (
                'product_id' => 673,
                'sub_category_id' => 22,
            ),
            327 => 
            array (
                'product_id' => 674,
                'sub_category_id' => 22,
            ),
            328 => 
            array (
                'product_id' => 675,
                'sub_category_id' => 22,
            ),
            329 => 
            array (
                'product_id' => 676,
                'sub_category_id' => 22,
            ),
            330 => 
            array (
                'product_id' => 677,
                'sub_category_id' => 22,
            ),
            331 => 
            array (
                'product_id' => 678,
                'sub_category_id' => 23,
            ),
            332 => 
            array (
                'product_id' => 679,
                'sub_category_id' => 23,
            ),
            333 => 
            array (
                'product_id' => 680,
                'sub_category_id' => 23,
            ),
            334 => 
            array (
                'product_id' => 681,
                'sub_category_id' => 23,
            ),
            335 => 
            array (
                'product_id' => 682,
                'sub_category_id' => 23,
            ),
            336 => 
            array (
                'product_id' => 683,
                'sub_category_id' => 23,
            ),
            337 => 
            array (
                'product_id' => 684,
                'sub_category_id' => 23,
            ),
            338 => 
            array (
                'product_id' => 685,
                'sub_category_id' => 23,
            ),
            339 => 
            array (
                'product_id' => 686,
                'sub_category_id' => 23,
            ),
            340 => 
            array (
                'product_id' => 687,
                'sub_category_id' => 23,
            ),
            341 => 
            array (
                'product_id' => 688,
                'sub_category_id' => 23,
            ),
            342 => 
            array (
                'product_id' => 689,
                'sub_category_id' => 23,
            ),
            343 => 
            array (
                'product_id' => 690,
                'sub_category_id' => 23,
            ),
            344 => 
            array (
                'product_id' => 690,
                'sub_category_id' => 18,
            ),
            345 => 
            array (
                'product_id' => 691,
                'sub_category_id' => 23,
            ),
            346 => 
            array (
                'product_id' => 691,
                'sub_category_id' => 18,
            ),
            347 => 
            array (
                'product_id' => 692,
                'sub_category_id' => 23,
            ),
            348 => 
            array (
                'product_id' => 692,
                'sub_category_id' => 18,
            ),
            349 => 
            array (
                'product_id' => 693,
                'sub_category_id' => 23,
            ),
            350 => 
            array (
                'product_id' => 693,
                'sub_category_id' => 18,
            ),
            351 => 
            array (
                'product_id' => 694,
                'sub_category_id' => 23,
            ),
            352 => 
            array (
                'product_id' => 694,
                'sub_category_id' => 18,
            ),
            353 => 
            array (
                'product_id' => 695,
                'sub_category_id' => 23,
            ),
            354 => 
            array (
                'product_id' => 696,
                'sub_category_id' => 23,
            ),
            355 => 
            array (
                'product_id' => 697,
                'sub_category_id' => 23,
            ),
            356 => 
            array (
                'product_id' => 698,
                'sub_category_id' => 23,
            ),
            357 => 
            array (
                'product_id' => 699,
                'sub_category_id' => 23,
            ),
            358 => 
            array (
                'product_id' => 700,
                'sub_category_id' => 23,
            ),
            359 => 
            array (
                'product_id' => 701,
                'sub_category_id' => 23,
            ),
            360 => 
            array (
                'product_id' => 702,
                'sub_category_id' => 23,
            ),
            361 => 
            array (
                'product_id' => 703,
                'sub_category_id' => 23,
            ),
            362 => 
            array (
                'product_id' => 704,
                'sub_category_id' => 23,
            ),
            363 => 
            array (
                'product_id' => 705,
                'sub_category_id' => 23,
            ),
            364 => 
            array (
                'product_id' => 706,
                'sub_category_id' => 23,
            ),
            365 => 
            array (
                'product_id' => 707,
                'sub_category_id' => 23,
            ),
            366 => 
            array (
                'product_id' => 708,
                'sub_category_id' => 23,
            ),
            367 => 
            array (
                'product_id' => 708,
                'sub_category_id' => 18,
            ),
            368 => 
            array (
                'product_id' => 709,
                'sub_category_id' => 23,
            ),
            369 => 
            array (
                'product_id' => 709,
                'sub_category_id' => 18,
            ),
            370 => 
            array (
                'product_id' => 710,
                'sub_category_id' => 23,
            ),
            371 => 
            array (
                'product_id' => 711,
                'sub_category_id' => 23,
            ),
            372 => 
            array (
                'product_id' => 712,
                'sub_category_id' => 23,
            ),
            373 => 
            array (
                'product_id' => 713,
                'sub_category_id' => 23,
            ),
            374 => 
            array (
                'product_id' => 713,
                'sub_category_id' => 18,
            ),
            375 => 
            array (
                'product_id' => 714,
                'sub_category_id' => 23,
            ),
            376 => 
            array (
                'product_id' => 715,
                'sub_category_id' => 23,
            ),
            377 => 
            array (
                'product_id' => 716,
                'sub_category_id' => 23,
            ),
            378 => 
            array (
                'product_id' => 717,
                'sub_category_id' => 23,
            ),
            379 => 
            array (
                'product_id' => 718,
                'sub_category_id' => 23,
            ),
            380 => 
            array (
                'product_id' => 719,
                'sub_category_id' => 23,
            ),
            381 => 
            array (
                'product_id' => 720,
                'sub_category_id' => 23,
            ),
            382 => 
            array (
                'product_id' => 721,
                'sub_category_id' => 23,
            ),
            383 => 
            array (
                'product_id' => 722,
                'sub_category_id' => 23,
            ),
            384 => 
            array (
                'product_id' => 723,
                'sub_category_id' => 23,
            ),
            385 => 
            array (
                'product_id' => 724,
                'sub_category_id' => 23,
            ),
            386 => 
            array (
                'product_id' => 725,
                'sub_category_id' => 23,
            ),
            387 => 
            array (
                'product_id' => 726,
                'sub_category_id' => 28,
            ),
            388 => 
            array (
                'product_id' => 727,
                'sub_category_id' => 22,
            ),
            389 => 
            array (
                'product_id' => 727,
                'sub_category_id' => 18,
            ),
        ));
        
        
    }
}