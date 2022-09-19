<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index',[
            'users'=> User::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create',[
            'roles' => Role::all(),            
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
            "name" => "required|string|max:30",
            "role" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6|confirmed"
        ],[
            "name.required" => "Nama wajib Diisi",
            "role.required" => "Role Wajib Diisi",
            "email.required" => "Email Wajib Diisi",
            "password.required" => "Password Wajib Diisi",
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole($request->role);
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            $request['role'] = Role::select('id','name')->find($request->role);
            return redirect()->back()->withInput($request->all());
        }finally{
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'users' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "role" => "required",
        ],[
            "role.required" => "Role Wajib Diisi",
        ]);

        DB::beginTransaction();
        try {
            $user->syncRoles($request->role);
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            $request['role'] = Role::select('id','name')->find($request->role);
            return redirect()->back()->withInput($request->all());
        }finally{
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
        $user->removeRole($user->roles->first());
            $user->delete();
        } catch (\Throwable $th) {
            DB::rollBack();
        }finally{
            DB::commit();
            return redirect()->route('users.index');
        }
    }
}
