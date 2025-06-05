<?php

namespace App\Action\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ListCategoriesAction
{
    public function execute(): Collection
    {
        $categories = Category::get();

        return $categories;
    }
}

