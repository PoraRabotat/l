<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Загружаем все заявки с автором и статусом
        $reports = Report::with(['user', 'status'])->latest()->get();
        $statuses = Status::all();

        return view('admin.index', compact('reports', 'statuses'));
    }
}