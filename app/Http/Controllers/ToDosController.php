<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\ToDo;
use DateTime;
use Error;
use Illuminate\Http\Request;

class ToDosController extends Controller
{
    public function index()
    {
        try {
            $todos = ToDo::all();
            return response(content: compact('todos'), status: 200);
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
            return response(compact("todo"), 200);
        } catch (Error $err) {
            return response(json_encode([
                "message" => "Failed to retrieve tasks",
                "err_disc" => $err->getMessage()
            ]), 500);
        }
    }
    public function store(TodoRequest $todo)
    {
        try {
            Todo::create([
                "name" => $todo->name,
                "description" => $todo->description,
                "deadline" => (new DateTime($todo->deadline))->format("Y-m-d H:i:s")
            ]);
            return response("Success create", 200);
        } catch (Error $err) {
            return response(json_encode([
                "message" => "Creation failed",
                "err_disc" => $err->getMessage(),
            ]), 200);
        }
    }
    public function edit(TodoRequest $todo, $id)
    {
        try {
            $todo_db = Todo::find($id);
            $todo_db::update([
                "name" => $todo->name,
                "description" => $todo->description,
                "deadline" => $todo->deadline
            ]);
            return response("Success update", 200);
        } catch (Error $err) {
            return response(json_encode([
                "message" => "Update failed",
                "err_disc" => $err->getMessage(),
            ]), 500);
        }
    }
    public function delete($id)
    {
        try {
            $todo_db = Todo::find($id);
            $todo_db->delete();
            return response("Success delete", 200);
        } catch (Error $err) {
            return response(json_encode([
                "message" => "Update failed",
                "err_disc" => $err->getMessage(),
            ]), 500);
        }
    }
}
