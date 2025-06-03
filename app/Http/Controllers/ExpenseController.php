<?php

namespace App\Http\Controllers;

use App\Action\Expense\ListExpensesAction;
use App\Action\Expense\StoreExpenseAction;
use App\Action\Expense\SummarizeExpensesAction;
use App\Action\Expense\UpdateExpenseAction;
use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return (new ListExpensesAction)->execute();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpenseRequest $request)
    {
        $this->authorize('create', Expense::class);
        return (new StoreExpenseAction)->execute($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        $this->authorize('update', $expense);
        return (new UpdateExpenseAction)->execute($expense, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $this->authorize('delete', $expense);
        $expense->delete();
    }

    public function summary($yearMonth)
    {
        $validator = validator(['yearMonth' => $yearMonth], [
            'yearMonth' => ['required', 'regex:/^\d{4}(0[1-9]|1[0-2])$/'],
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid yearMonth format. Use YYYYMM.',
                'errors' => $validator->errors()
            ], 422);
        }

        return (new SummarizeExpensesAction)->execute($yearMonth);
    }
}
