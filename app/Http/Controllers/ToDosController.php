<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Error;
use Illuminate\Http\Request;

class ToDosController extends Controller
{
    public function index()
    {
        try {
            $todos = ToDo::all();
            return response(compact('todos'), 200);
            // return response()->json([compact('todos'), "status" => 500]);
        } catch (Error $err) {
            // return response()->json(["error" => "Failed to retrieve tasks", "status" => 500]);
            return response(json_encode([
                "message" => "Непредвиденная ошибка",
                "err_disc" => $err->getMessage()
            ]), 500);
        }
    }
    public function show($id)
    {
        try {
            $todo = Todo::find($id);
            return response(compact($todo), 200);
        } catch (Error $err) {
            return response(json_encode([
                "message" => "Failed to retrieve tasks",
                "err_disc" => $err->getMessage()
            ]), 500);
        }
    }
    public function create(Request $todo)
    {
        try {
            Todo::create([
                "name" => $todo->name,
                "description" => $todo->description,
                "deadline" => $todo->deadline
            ]);
            return response("Success create", 500);
        } catch (Error $err) {
            return response(json_encode([
                "message" => "Creation failed",
                "err_disc" => $err->getMessage(),
            ]), 200);
        }
    }
}
