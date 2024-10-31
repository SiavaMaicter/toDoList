<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDosController extends Controller
{
    public function index()
    {
        $todos = ToDoвфвфв::all();
        return compact('todos');
    }
}
