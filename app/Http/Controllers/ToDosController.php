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
            return response(compact('todos'), status: 200);
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
            return response("Success create", 200);
        } catch (Error $err) {
            return response(json_encode([
                "message" => "Creation failed",
                "err_disc" => $err->getMessage(),
            ]), 200);
        }
    }
    public function edit(Request $todo, $id)
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
