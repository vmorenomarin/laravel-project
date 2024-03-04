<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseReport;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validData = $request->validate([
            'description' => 'required|min:3',
            'price' => 'required'
        ]);

        $expense = new Expense();
        
        $expense->description = $validData['description'];
        $expense->price = $validData['price'];
        $expense->expense_report_id=$expenseReport->id;
        $expense->save();
        $expenseReport->price=$expenseReport->expenses->sum('price');
        $expenseReport->save();


        return redirect(to: "expense_reports/$expenseReport->id");

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $expense)
    {
        
        $dataExpense = Expense::find($expense);
        
        // dd($expense);
        

        return view(view:'ExpenseReports.formEditExpense', data:['dataExpense' => $dataExpense]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense= Expense::find($id);
        $reportId=$expense->expense_report_id;
        $expense->delete();
        return redirect(to: "expense_reports/{$reportId}");
    }

    public function confirmDelete(string $id)
    {
        $expense = Expense::find($id);

        return view(view: 'alerts.confirmAlertExpense', data: ['expense' => $expense]);
    }
}