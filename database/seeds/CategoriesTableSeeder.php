<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories= [
            'Backend',
            'Frontend',
            'UX',
            'UI',
            'Netwok'
        ];

        for($i=0; $i< count($categories); $i++) {
            $newCategory = new Category();

            $newCategory->name = $categories[$i];
            $newCategory->slug = Str::slug($newCategory->name, '-');

            $newCategory->save();
        }
    }
}
