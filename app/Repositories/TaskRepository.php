<?php
namespace App\Repositories;

use App\Repositories\Repository;
use App\Task;

class TaskRepository extends Repository
{
    public function __construct(Task $task) {
        $this->model = $task;
    }
    
    public function getTasks($page)
    {
        return $this->model->where('user_id', auth()->user()->id)->paginate($page);
    }
    
    public function save($request) 
    {
        $validator = validator($request->all(), $this->rules());
        
        if ($validator->fails()) {
            return $validator;
        }
        
        $taskId = (int) $request->get('task_id');
        $task   = $this->model;
        
        if ($taskId) {
            $task = $this->model->find($taskId);
            
            if (is_null($task)) {
                $validator->errors()->add('name', 'Whoop!! Task does not exist, please try again.');
                
                return $validator;
            }
        }
        
        $task->user_id = auth()->user()->id;
        $task->name    = $request->get('name');
        $task->content = $request->get('content');
        $task->save();
    }
    
    public function complete($request) 
    {
        $taskId = (int) $request->get('task_id');
        
        if ($taskId) {
            $task = $this->model->find($taskId);
            
            if (is_null($task)) {
                return false;
            }
            $task->isCompleted = 1;
            $task->save();
            
            return true;
        }
        
        return false;
    }
    
    public function rules()
    {
        return [
            'name'    => 'required|min:6|max:250',
            'content' => 'required|min:10|max:1000'
        ];
    }
}