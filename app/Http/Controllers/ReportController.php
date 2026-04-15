<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view("report.index", compact("reports"));
    }

    public function destroy(Report $report)
    {
        $report->delete(); // благодаря SoftDeletes запись не удалится физически, а помечается deleted_at
        return redirect()->route('reports.index');
    }



    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_number'  => 'required|string|max:20',
            'description' => 'required|string',
        ]);

        Report::create($validated);

        return redirect()->route('reports.index')->with('success', 'Заявление создано');
    }


    public function show(Report $report)
    {
        return view('report.show', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'car_number'  => 'required|string|max:20',
            'description' => 'required|string',
        ]);

        $report->update($validated);

        return redirect()->route('reports.index')->with('success', 'Заявление обновлено');
    }
}
