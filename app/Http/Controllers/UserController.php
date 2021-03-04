<?php

namespace App\Http\Controllers;

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
        $users =  User::all();
        return view('users.index', ['users' => $model->paginate(15)])->with('users', $users);
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/user')->with('success', 'User Removed');

    }
}
