<?php
namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Project;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user', 'project')->get();
        $projects = Project::all();
        return view('messages.index', compact('messages', 'projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'project_id' => 'required|exists:projects,id',
        ]);

        Message::create([
            'content' => $request->content,
            'user_id' => auth()->id(),
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('messages.index')->with('success', 'Message envoyé avec succès.');
    }
}
