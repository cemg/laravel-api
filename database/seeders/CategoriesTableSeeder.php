<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        //DB::table('categories')->truncate();
        Category::truncate();

        for ($i = 0; $i < 30; $i++) {
            $category_name = rtrim($faker->sentence(1), '.');

            Category::create([
                'name' => $category_name,
                'slug' => Str::slug($category_name)
            ]);
        }

        DB::table('product_categories')->insert(['product_id' => 1, 'category_id' => 1]);
        DB::table('product_categories')->insert(['product_id' => 1, 'category_id' => 2]);
        DB::table('product_categories')->insert(['product_id' => 2, 'category_id' => 1]);
        DB::table('product_categories')->insert(['product_id' => 2, 'category_id' => 2]);
        DB::table('product_categories')->insert(['product_id' => 2, 'category_id' => 3]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
