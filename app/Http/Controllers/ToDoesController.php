<?php

namespace App\Http\Controllers;

use App\Models\Todoes;
use Illuminate\Http\Request;

class ToDoesController extends Controller
{
    public function index()
    {
        $todo = Todoes::all();
        return compact('todo');
    }
}
