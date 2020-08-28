<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Http\Resources\Role\RoleCollection;
use App\Http\Resources\Role\Role as RoleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::denies('access_role')) {
            return abort(401);
        }
        if ($request->showData) {
            return Role::all();
        }
        $columns = ['id', 'name'];
        $dir = $request->dir;
        $length = $request->length;
        $column = $request->column;
        $query = Role::orderBy($columns[$column], $dir);
        $search = $request->search;
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $data = $query->paginate($length);
        return new RoleCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        if (Gate::denies('create_role')) {
            return abort(401);
        }
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->input("permission", []));
        return new RoleResource($role);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        if (Gate::denies('view_role')) {
            return abort(401);
        }
        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        if (Gate::denies('edit_role')) {
            return abort(401);
        }
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->input('permission'));
        return new RoleResource($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if (Gate::denies('delete_role')) {
            return abort(401);
        }
        $role->syncPermissions([]);
        $role->delete();
        return response()->json(["message" => "Successfully delete role."]);
    }
}
