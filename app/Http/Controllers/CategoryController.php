<?php

namespace App\Http\Controllers;

use App\Action\Category\ListCategoriesAction;

class CategoryController extends Controller
{
    public function index()
    {
        return (new ListCategoriesAction)->execute();
    }
}
