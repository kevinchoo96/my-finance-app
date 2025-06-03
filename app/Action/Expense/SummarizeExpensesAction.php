<?php

namespace App\Action\Expense;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SummarizeExpensesAction
{
    public function execute($month)
    {
        $summary = Expense::with('category')
        ->select('category_id')
        ->selectRaw('COUNT(*) as total_expenses')
        ->selectRaw('SUM(amount) as total_amount')
        ->where('user_id', Auth::id())
        ->groupBy('category_id')
        ->get();
    }
}

