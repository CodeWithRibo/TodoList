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
    // ! ADD DATA
    public function add(Request $request)
    {
        $validated = $request->validate([
            'list' => 'required|string|min:5|max:30'    
        ]);
        
        TaskList::create($validated);
        return redirect('/');
    }
    //!UPDATE DATA
    public function showEdit(TaskList $taskList)
    {
        return view('update',['taskList' => $taskList]);
    }

    public function edit(TaskList $taskList,Request $request)
    {
        $validate = $request->validate([
            'list' => 'required|string|max:30'
        ]);
        $taskList->update($validate);
        return redirect('/')->with('success','Todo list sucessfully created');
    }
    // !!DELETE DATA
    public function destroy(TaskList $taskList) 
    {
        $taskList->delete();
        return redirect('/')->with('success','Todo list sucessfully deleted');
    }


}
