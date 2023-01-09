<?php

namespace App\Http\Controllers\ToDoList\Image;

use App\Http\Controllers\Controller;
use App\Models\ToDoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(ToDoList $list)
    {
        if (isset($list->image)) {
            Storage::disk('public')->delete($list->image);

            $list->image = null;
            $list->save();
        }

        return redirect()->route('list.index');
    }
}
