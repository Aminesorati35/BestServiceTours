<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if($user->isSuperAdmin()){
            $users = User::whereIn('role',['admin','client','superAdmin'])->where('role',"!=","superAdmin")->orderByRaw("FIELD(role, 'superAdmin', 'admin', 'client')")->paginate(10);
        }else if($user->isAdmin()){
            $users = User::where('role', 'client')->get();
        } else{
            abort(403, 'Unauthorized Access');
        }

        return view ('Users.admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('home');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return redirect()->route('home');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        return redirect()->route('home');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User Supprimer Avec Succès.');

    }

    public function updateRole(Request $request, User $user){
        if (Auth::user()->isSuperAdmin()) {
            // Validate the role input (optional, just in case)
            $validated = $request->validate([
                'role' => 'required|in:client,admin', // Allow only these roles
            ]);
            $user->role = $validated['role'];
            $user->save();
            return redirect()->route('admin.users.index')->with('success', 'User role updated successfully!');

        }
        abort(403, 'Unauthorized Access');
}
}
