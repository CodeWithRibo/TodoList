<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class Task extends Controller
{
    // protected $addList;

    public function index()
    {
        $notes = TaskList::orderBy('created_at','asc')->get();
        return view('index',['notes' => $notes]);
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'list' => 'required|string|min:5|max:30'    
        ]);
        
        TaskList::create($validated);
        return redirect('/');
    }

    public function edit(Request $request, TaskList $taskList)
    {
        // $taskList = $request -> all();
        // TaskList::findOrFail() -> update($taskList);
        // return redirect('/');
    }

    public function destroy(TaskList $taskList) 
    {
        $taskList->delete();
        return redirect('/');
    }


}
