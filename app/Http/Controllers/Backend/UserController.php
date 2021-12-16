<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {

        $users = \DB::table('users')
            ->select('users.*','user_roles.title as roleTitle')
            ->leftJoin('user_roles','user_roles.id','=','users.role_id')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the add user form
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function edit(User $model)
    {

        $roles = \DB::table('user_roles')->get();

        return view('admin.users.edit', compact('roles'));
    }
}
