<?php

namespace App\Action\Expense;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SummarizeExpensesAction
{
    public function execute(string $yearMonth)
    {
        $startOfMonth = Carbon::createFromFormat('Ym', $yearMonth)->startOfMonth();
        $endOfMonth = Carbon::createFromFormat('Ym', $yearMonth)->endOfMonth();

        $summary = Expense::with('category')
        ->select('category_id')
        ->selectRaw('SUM(amount) as total_amount')
        ->where('expense_date', '>=', $startOfMonth)
        ->where('expense_date', '<=', $endOfMonth)
        ->where('user_id', Auth::id())
        ->groupBy('category_id')
        ->get();

        return $summary;
    }
}

