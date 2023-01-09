<?php

namespace App\Http\Controllers\ToDoList\Image;

use App\Http\Controllers\Controller;
use App\Http\Requests\Image\StoreRequest;
use App\Models\ToDoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, ToDoList $list)
    {
        $data = $request->validated();

        if (!is_null($list->image)) {
            Storage::disk('public')->delete($list->image);
        }

        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        $list->update($data);

        return redirect()->route('list.index');
    }
}
