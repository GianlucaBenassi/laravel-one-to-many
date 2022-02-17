<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Technology', 'Sport', 'Fashion', 'Kitchen'];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::of($newCategory->name)->slug("-");
            $newCategory->save();
        }

    }
}
