<?php

namespace App\Http\Controllers;

use Validator;
use Config;
use App\User;
use App\Icebox;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Dingo\Api\Exception\ValidationHttpException;

use App\Http\Requests\NewIceboxRequest;

use Carbon\Carbon;

/**
* Task Controller - Handles task creation, attachments, types and notes.
*/
class IceboxController extends ApiController
{

	public function create(NewIceboxRequest $request)
	{
		$currentUser = $request->user();
		$request->request->add(['user_id' => $currentUser->id]);
		Icebox::create($request->all());
		return $this->response->created();
	}

	public function all(Request $request)
	{
		$currentUser = $request->user();

		$icebox = Icebox::where('user_id', $currentUser->id)->get();

		return response()->json($icebox);
	}
}