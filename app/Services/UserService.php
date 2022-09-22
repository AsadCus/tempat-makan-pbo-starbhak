<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handleAllUser()
    {
        $data = $this->user->all();
        return($data);
    }

    public function handleStoreUser(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'level' => 'required',
            'password' => ''
        ]);

        $validatedData['password'] = '12345tempatmakan';

        $this->user->create($validatedData);
    }

    public function handleUpdateUser(Request $request, $id)
    {
        $this->user->find($id)->update($request->all());
    }

    public function handleDeleteUser($id)
    {
        $user = $this->user->find($id);
        $user->delete();
    }
}
