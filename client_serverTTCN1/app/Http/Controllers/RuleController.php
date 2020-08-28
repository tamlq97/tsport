<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->getPermissionsViaRoles()->pluck('name');
    }
}
