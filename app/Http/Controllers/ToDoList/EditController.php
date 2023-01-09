<?php

namespace App\Http\Controllers\ToDoList;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(ToDoList $list)
    {
        return view('list.edit', compact('list'));
    }
}
