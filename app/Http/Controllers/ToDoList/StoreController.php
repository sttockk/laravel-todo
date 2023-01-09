<?php

namespace App\Http\Controllers\ToDoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToDoList\StoreRequest;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $list = ToDoList::Create($data);

        return response()->json(['status' => true, 'list' => $list])->setStatusCode(200, 'Item was added');
    }
}
