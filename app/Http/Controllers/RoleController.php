<?php

namespace App\Http\Controllers;

// use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('role.index',[
            'roles'=> Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create',[
            'authorities' => config('permission.authorities'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|string|max:50|unique:roles,name",
            'permissions' => "required",
        ],
        [
            'name.required' => "Nama Roles wajib diisi !!!",
            'name.string' => "Nama Roles berupa huruf !!!",
            'name.max' => "Nama Roles Max 50 Karakter !!!",
            'name.unique' => "Nama Roles sudah ada !!!",
            'permissions.required' => "Hak Akses wajib diisi !!!",
        ]);

        // dd($request->all());
        DB::beginTransaction();
        try {
            $role = Role::create(['name' => $request->name]);
            $role->givePermissionTo($request->permissions);
            return redirect()->route('role.index');
        } catch (\Throwable $th) {
            DB::rollBack();
        }finally{
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('role.detail',[
            'role' => $role,
            'authorities' => config('permission.authorities'),
            'rolePermissions' => $role->permissions->pluck('name')->toArray(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('role.edit', [
            'role' => $role,
            'authorities' => config('permission.authorities'),
            'permissionChecked' => $role->permissions->pluck('name')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => "required|string|max:50" . $role->id,
            'permissions' => "required",
        ],
        [
            'name.required' => "Nama Roles wajib diisi !!!",
            'name.string' => "Nama Roles berupa huruf !!!",
            'name.max' => "Nama Roles Max 50 Karakter !!!",
            'permissions.required' => "Hak Akses wajib diisi !!!",
        ]);

        DB::beginTransaction();
        try {
            $role->name = $request->name;
            $role->syncPermissions($request->permissions);
            $role->save();
            // Alert::success('Data Role', 'Berhasil ditambahkan !!!');
            return redirect()->route('role.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withInput($request->all());
        }finally{
            DB::commit();
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        DB::beginTransaction();
        try {
            $role->revokePermissionTo($role->permissions->pluck('name')->toArray());
            $role->delete();
        } catch (\Throwable $th) {
            DB::rollback();
        }finally{
            DB::commit();
        }
        return redirect()->route('role.index');
    }
}
