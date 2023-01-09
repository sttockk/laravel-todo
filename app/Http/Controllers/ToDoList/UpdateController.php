<?php

namespace App\Http\Controllers\ToDoList;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToDoList\UpdateRequest;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, ToDoList $list)
    {
        $data = $request->validated();
        $list->update($data);

        return redirect()->route('list.index');
    }
}
