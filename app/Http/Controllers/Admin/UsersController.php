<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware( middleware:'auth');
    }

    public function index()
    {
        $users = User::all();
        return view (view: 'admin.users.index')->with('users',$users);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {   
        if(Gate::denies('edit-users')){
            return redirect(route(name:'admin.users.index'));
        }
        $roles = Role::all();

        return view(view:'admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route(route:'admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route(name:'admin.users.index'));
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route(route:'admin.users.index');
    }
}
