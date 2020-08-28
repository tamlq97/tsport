<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\PermissionStoreRequest;
use App\Http\Requests\Permission\PermissionUpdateRequest;
use App\Http\Resources\Permission\PermissionCollection;
use App\Http\Resources\Permission\Permission as PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::denies('access_permission')) {
            return abort(401);
        }
        if ($request->showData) {
            return Permission::all();
        }
        $columns = ['id', 'name'];
        $dir = $request->dir;
        $length = $request->length;
        $column = $request->column;
        $query = Permission::orderBy($columns[$column], $dir);
        $search = $request->search;
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $data = $query->paginate($length);
        return new PermissionCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(PermissionStoreRequest $request)
    {
        if (Gate::denies('create_permission')) {
            return abort(401);
        }
        $permission = Permission::create(['name' => $request->name]);
        return new PermissionResource($permission);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        if (Gate::denies('view_permission')) {
            return abort(401);
        }
        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionUpdateRequest $request, Permission $permission)
    {
        if (Gate::denies('edit_permission')) {
            return abort(401);
        }
        $permission->update(['name' => $request->name]);
        return new PermissionResource($permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if (Gate::denies('delete_permission')) {
            return abort(401);
        }
        $permission->delete();
        return response()->json(["message" => "Successfully delete role."]);
    }
}
