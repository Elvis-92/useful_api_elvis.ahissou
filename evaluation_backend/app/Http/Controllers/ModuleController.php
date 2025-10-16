<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return response()->json([
            "message" => "OK",
            "modules" => $modules
        ], 200);
    }
}
