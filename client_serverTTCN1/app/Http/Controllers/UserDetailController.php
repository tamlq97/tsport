<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class UserDetailController extends Controller
{
    public function update(Request $request,$userDetaiId)
    {
        $userDetail = UserDetail::find($userDetaiId);
        if(Gate::denies('edit_user')) abort(401);
        $credentials = $this->validate($request,[
            'contact_fname' => 'required',
            'contact_lname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'phone' => 'required'
        ]);
        $userDetail->update($credentials);
        return response()->json(['message' => 'Successful update profile']);
    }
}
;