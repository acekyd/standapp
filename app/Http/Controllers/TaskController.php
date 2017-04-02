<?php

namespace App\Http\Controllers;

use Validator;
use Config;
use App\User;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Dingo\Api\Exception\ValidationHttpException;

use App\Http\Requests\CreateTaskRequest;

use Carbon\Carbon;

/**
* Task Controller - Handles task creation, attachments, types and notes.
*/
class TaskController extends ApiController
{

	public function create(CreateTaskRequest $request)
	{
		$currentUser = $request->user();
		$request->request->add(['user_id' => $currentUser->id]);
		Task::create($request->all());
		return $this->response->created();
	}
}