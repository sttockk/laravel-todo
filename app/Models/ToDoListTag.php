<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDoListTag extends Model
{
    use HasFactory;

    protected $table = 'to_do_list_tags';
    protected $guarded = false;
}
