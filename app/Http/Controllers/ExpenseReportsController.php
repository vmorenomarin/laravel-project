<?php

namespace App\Http\Controllers;

use App\Mail\ExpensesReport;
use App\Models\Expense;
use App\Models\ExpenseReport;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class ExpenseReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenseReportsData = ExpenseReport::all();
        $expensesSum = $expenseReportsData->sum('price');
        if ($expenseReportsData->count() > 0)
            $expenseReportsData[0]['total'] = $expensesSum;

        // dd($expenseReportsData->count());

        return view('ExpenseReports.index', ['dataReport' => $expenseReportsData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ExpenseReports.formCreateReport');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {

        $validData = $req->validate([
            'description' => 'required|min:3'
        ]);
        $report = new ExpenseReport();
        $report->description = $validData['description'];
        $report->is_active = null == $req->get(key: 'toggle') ? false : true;

        $report->save();

        return redirect(to: 'expense_reports');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseReport $expenseReport, Request $req)
    {
        $message=null!==$req->get('message') ? $req->get('message') :'';
        return view(view: 'ExpenseReports.formShowReport', data: ['report' => $expenseReport, 'message'=>$message]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view(view: 'ExpenseReports.formEditReport', data: ['report' => $report]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $report = ExpenseReport::find($id);
        $report->description = $req->get(key: 'description');
        $report->price = $report->expenses->sum('price');
        $report->is_active = null == $req->get(key: 'toggle') ? false : true;

        $report->save();

        return redirect(to: 'expense_reports');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = ExpenseReport::find($id);
        $report->delete();
        return redirect(to: 'expense_reports');
    }


    public function confirmDelete(string $id)
    {
        $report = ExpenseReport::find($id);

        return view(view: 'alerts.confirmAlertReport', data: ['report' => $report]);
    }

    public function confirmSendEmail(ExpenseReport $expenseReport)
    {
        return view(view: 'alerts.confirmAlertEmail', data: ['report' => $expenseReport]);
    }

    public function sendEmail(Request $req, ExpenseReport $expenseReport)
    {
        Mail::to($req->get('email'))->send(new ExpensesReport($expenseReport));

        $message="Email with report $expenseReport->id ($expenseReport->description), was sended successfuly)";

        return redirect("/expense_reports/$expenseReport->id?message=$message");
    }
}