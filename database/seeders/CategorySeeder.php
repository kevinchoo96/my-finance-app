<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoriesList = [
            'Food & Dining',
            'Transportation',
            'Shopping',
            'Bills & Utilities',
            'Entertainment',
            'Others'
        ];

        foreach($categoriesList as $categoryName)
        {
            $category = (new Category());
            $category->name = $categoryName;
            $category->save();
        }
    }
}
