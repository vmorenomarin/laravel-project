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
    public function store(Request $request, ExpenseReport $expenseReport)
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
        $message="Expense created succesfully.";

        return redirect(to: "/expense_reports/{$expenseReport->id}?message=$message");
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
    public function edit(string $reportId, string $expenseID)
    {
        $dataExpense = Expense::find($expenseID);

        return view(view:'ExpenseReports.formEditExpense', data:['dataExpense' => $dataExpense]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpenseReport $expenseReport, string $expenseId)
    {

        $validData = $request->validate([
            'description' => 'required|min:3',
            'price' => 'required'
        ]);

        $expense = Expense::find($expenseId);
        
        $expense->description = $validData['description'];
        $expense->price = $validData['price'];
        $expense->expense_report_id=$expenseReport->id;
        $expense->save();
        $expenseReport->price=$expenseReport->expenses->sum('price');
        $expenseReport->save();
        $message="Expense updated succesfully.";

        return redirect(to: "/expense_reports/{$expenseReport->id}?message=$message");      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseReport $expenseReport, string $id, )
    {
        // dd($expenseReport);
        $expense= Expense::find($id);
        $expense->delete();
        $expenseReport->price = $expenseReport->expenses->sum('price');
        $expenseReport->save();
        $message="Expense deleted succesfully.";
        return redirect(to: "/expense_reports/{$expenseReport->id}?message=$message");
    }

    public function confirmDelete(string $id)
    {
        $expense = Expense::find($id);

        return view(view: 'alerts.confirmAlertExpense', data: ['expense' => $expense]);
    }
}