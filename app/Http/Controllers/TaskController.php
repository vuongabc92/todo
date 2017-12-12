<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use Illuminate\Validation\Validator;

class TaskController extends Controller
{

    protected $taskRepo;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepo = $taskRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $tasks = $this->taskRepo->getTasks(15);
        
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }
    
    public function add() {
        return view('tasks.add');
    }
    
    public function edit($id) {
        
        $task = $this->taskRepo->find($id);
        
        if (is_null($task)) {
            return redirect(route('task_add'));
        }
        
        return view('tasks.edit', [
            'task' => $task
        ]);
    }
    
    public function save(Request $request)
    {
        if ($request->isMethod('post')) {
            
            $save = $this->taskRepo->save($request);
            
            if ($save instanceof Validator) {
                return back()->withInput()->withErrors($save);
            }
            
            return redirect(route('tasks'));
        }
    }
    
    public function complete(Request $request)
    {
        if ($request->isMethod('post')) {
            $complete = $this->taskRepo->complete($request);
            
            if ( ! $complete) {
                return redirect(route('tasks'))->with('error', 'Task does not exist.');
            }
            
            return redirect(route('tasks'))->with('success', 'Task is completed.');
        }
    }
}
