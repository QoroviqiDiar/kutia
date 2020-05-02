<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    private $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository, RoleRepositoryInterface $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('admin.users.index',  ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     */
    public function edit(User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect()->route('users.index');
        }

        $roles = $this->roleRepository->getAll();
        return view('admin.users.edit', [
            'model' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     */
    public function update(Request $request, User $user)
    {
        if (Auth::user()->id == $user->id) {
            return redirect()->route('users.index');
        }

        $this->userRepository->updateUserRoles($user, $request->roles);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
