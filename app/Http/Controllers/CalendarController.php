<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }

    public function fetchEvents()
    {
        $tasks = Task::all();
        $events = $tasks->map(function ($task) {
            return [
                'id' => $task->id,
                'title' => $task->name,
                'start' => $task->start_date,
                'end' => $task->end_date,
                'description' => $task->description,
            ];
        });

        return response()->json($events);
    }
}
