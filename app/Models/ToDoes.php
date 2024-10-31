<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todoes extends Model
{
    use HasFactory;
    protected $table = "todoes";
    protected $guarded = false;
}
