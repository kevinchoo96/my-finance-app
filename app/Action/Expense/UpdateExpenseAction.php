<?php

namespace App\Action\Expense;

use App\Models\Category;
use App\Models\Expense;

class UpdateExpenseAction
{
    public function execute(Expense $expense, array $request): Expense
    {
        $expense->category_id = Category::firstWhere('name', $request['category'])->id;
        $expense->description = $request['description'];
        $expense->amount = $request['amount'];
        $expense->expense_date = $request['expense_date'];
        $expense->save();

        return $expense;
    }
}

