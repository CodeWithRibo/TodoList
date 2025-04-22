<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = ['list'];
    protected $guarded = ['id'];
    protected $table = 'todo_list';

    
    /** @use HasFactory<\Database\Factories\RiboFactory> */
    use HasFactory;
}
