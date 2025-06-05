<?php

namespace App\Action\Expense;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;

class StoreExpenseAction
{
    public function execute(array $request): Expense
    {
        $expense = (new Expense());

        $expense->user_id = Auth::id();
        $expense->category_id = Category::firstWhere('type', $request['category'])->id;
        $expense->description = $request['description'];
        $expense->amount = $request['amount'];
        $expense->expense_date = $request['expense_date'];
        $expense->save();

        return $expense;
    }
}

