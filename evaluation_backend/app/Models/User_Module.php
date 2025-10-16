<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Client\Request;
use Illuminate\Database\Eloquent\Model;


class User_Module extends Model
{
    public function active($id, Request $request)
    {
        User_Module::find($id)
                ->where('user_id', $request->user()->id)
                ->update(['active' => true]);
    }

    public function desactive($id, Request $request)
    {
        User_Module::find($id)
                ->where('user_id', $request->user()->id)
                ->update(['active' => false]);
    }
}
