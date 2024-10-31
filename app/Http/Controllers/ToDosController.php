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
        } catch (Error $err) {
            // return response()->json(["error" => "Failed to retrieve tasks", "status" => 500]);
            return response("Failed to retrieve tasks", 500);
        }
        return response(compact('todos'), 200);
        // return response()->json([compact('todos'), "status" => 500]);
    }
}
