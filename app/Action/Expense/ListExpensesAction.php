<?php

namespace App\Action\Expense;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ListExpensesAction
{
    public function execute(): Collection
    {
        $expenses = Expense::with('category')
                    ->where('user_id', Auth::id())
                    ->orderBy('expense_date', 'desc')
                    ->orderBy('id', 'desc')
                    ->get();
                    

        return $expenses;
    }
}

