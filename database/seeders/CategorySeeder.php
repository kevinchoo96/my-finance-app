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
            'food' => 'Food & Dining',
            'transportation' => 'Transportation',
            'shopping' => 'Shopping',
            'bill' => 'Bills & Utilities',
            'entertainment' => 'Entertainment',
            'others' => 'Others'
        ];

        foreach($categoriesList as $categoryType => $categoryName)
        {
            $category = (new Category());
            $category->type = $categoryType;
            $category->name = $categoryName;
            $category->save();
        }
    }
}
