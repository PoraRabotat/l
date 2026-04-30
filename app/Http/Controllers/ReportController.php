<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\Status;

class ReportController extends Controller
{

    public function index(Request $request)
    {
        $sort = $request->query('sort', 'created_at_desc');
        $statusFilter = $request->query('status'); // null, если фильтр не выбран

        $query = Report::with('status');
        // фильтрация
        if ($statusFilter) {
            $query->where('status_id', $statusFilter);
        }
        // сортировать
        if ($sort === 'created_at_asc') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $reports = $query->paginate(10);
        $statuses = Status::all();

        return view('report.index', compact('reports', 'sort', 'statusFilter', 'statuses'));
    }
    
    public function destroy(Report $report)
    {
        $report->delete(); // запись не удалится физически, а помечается deleted_at
        return redirect()->route('reports.index');
    }


    public function create()
    {
        return view('report.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number'  => 'required|string|max:20',
            'text' => 'required|string',
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
            'number'  => 'required|string|max:20',
            'text' => 'required|string',
        ]);

        $report->update($validated);

        return redirect()->route('reports.index')->with('success', 'Заявление обновлено');
    }
}
