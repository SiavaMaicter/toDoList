<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ToDo extends Model
{
    use HasFactory;
    protected $table = "todos";
    protected $guarded = false;
}
