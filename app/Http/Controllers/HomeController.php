<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->date) {
            $filteredDate = $request->date; 
        }
        if ($request->date == null) {
            $filteredDate = date('Y-m-d');
        }

        $tasks = Task::whereDate('due_date', $filteredDate)->get();

        $carbonDate = Carbon::createFromDate($filteredDate);

        $data = [
            'tasks' => $tasks,
            'tasks_count' => $tasks->count(),
            'undone_tasks_count' => $tasks->where('is_done', false)->count(),
            'date_as_string' => $carbonDate->translatedFormat('d').' de '.ucfirst($carbonDate->translatedFormat('M')),
            'date_prev_button' => $carbonDate->addDay(-1)->format('Y-m-d'),
            'date_next_button' => $carbonDate->addDay(2)->format('Y-m-d')
        ];

        return view('home', $data);
    }
}
