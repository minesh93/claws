<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;
use App\Events\TaskAltered;



class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function addTask(Request $request){
		$task = new Task($request->input('name'),$request->input('description'));
		$task->user()->associate(Auth::user());
		if($task->save()){
			$task->load('user');
			broadcast(new TaskAltered($task))->toOthers();
			return $task;
		} else {
			return response($task->getErrors(),400);
		}
	}

	public function editTask(Request $request, $taskID){

		$task = Task::find($taskID);
		$task->name = $task->name;
		$task->description = $task->description;
		$task->complete =  !!$request->input('complete');
		if($task->save()){
			broadcast(new TaskAltered($task))->toOthers();
			return $task;
		} else {
			return response($task->getErrors(),400);
		}
	}

	public function getTasks(Request $request){
		return Task::with(['user'])->get();
	}

}
