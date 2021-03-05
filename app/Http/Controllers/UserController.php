<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\User;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $this->authorize('viewAny', User::class);
        $users = User::all()->where('approved_at', !null);
        return view('admin.admin-users', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:7|confirmed',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['verified'] = User::UNVERIFIED_USER;
        $data['verification_token'] = User::generateVerificationCode();
        $data['admin'] = $request->admin;

        $user = User::create($data);

        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Agregado',
            'message' => 'Usuario agregado con éxito a la base de datos',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         $this->authorize('update', $user);
        
        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('admin')) {
            $user->admin = $request->admin;
        }

        if (!$user->isDirty()) {
            return $this->errorResponse('You need to specify a different value to update', 422);
        }

        $user->save();

        return back()->with([
            'alert-type' => 'alert-success',
            'badge-type' => 'badge-success',
            'message-title' => 'Actualizado',
            'message' => 'El usuario ha sido actualizado exitosamente,',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();

        return back()->with([
            'alert-type' => 'alert-danger',
            'badge-type' => 'badge-danger',
            'message-title' => 'Eliminado',
            'message' => 'Usuario eliminado con éxito',
        ]);
    }

    /**
     * Aproves an unser setting the approved_at timestamp
     * 
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function approveUserView(User $user)
    {
        $users_pending = User::all()->where('approved_at', null);
        return view('admin.admin-user-approval', compact("users_pending"));
    }

    public function approveUser(User $user)
    {
        $user->update(['approved_at' => now()]);
        $users_pending = User::all()->where('approved_at', null);
        return view('admin.admin-user-approval', compact("users_pending"));
    }

    public function declineUser(User $user)
    {
        $user->delete();
        $users_pending = User::all()->where('approved_at', null);
        return view('admin.admin-user-approval', compact("users_pending"));
    }
}
