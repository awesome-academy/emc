<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            0 => [
                0 => 'Phone',
                1 => [
                    1 => 'IPhone',
                    2 => 'Samsung',
                    3 => 'Oppo',
                    4 => 'Xiaomi',
                    5 => 'VSmart',
                ]
            ],
            1 => [
                0 => 'Tablet',
                1 => [
                    1 => 'IPad',
                    2 => 'Samsung',
                    3 => 'Huawei',
                    4 => 'Lenovo',
                    5 => 'Masstel',
                ]
            ],
            2 => [
                0 => 'Laptop',
                1 => [
                    1 => 'MacBook',
                    2 => 'Asus',
                    3 => 'HP',
                    4 => 'Acer',
                    5 => 'Dell',
                ]
            ],
            3 => [
                0 => 'Accessories',
                1 => [
                    1 => 'Charger, cable',
                    2 => 'Headphone',
                    3 => 'Music speaker',
                    4 => 'USB',
                    5 => 'Memory Stick',
                ]
            ],
            4 => 'Clock',
        ];

        //create category level 1
        for ($i = 0; $i < sizeof($categories); $i++) {
            if (is_array($categories[$i][1])) {
                Category::create([
                    'name' => $categories[$i][0],
                ]);
            } else {
                Category::create([
                    'name' => $categories[$i],
                ]);
            }
        }

        //create category level 2
        for ($i = 0; $i < sizeof($categories); $i++) {
            $cate_chill = $categories[$i][1];
            if (isset($cate_chill) && is_array($cate_chill)) {
                foreach ($cate_chill as $key => $value) {
                    Category::create([
                        'parent_id' => $i + 1,
                        'name' => $value,
                    ]);
                }
            }

        }
    }
}
