<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->handleAllUser();
        return view('parsial.user', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $this->userService->handleStoreUser($request);
        return back();
    }

    public function update(Request $request, $id)
    {
        $this->userService->handleUpdateUser($request, $id);
        return back();
    }

    public function destroy($id)
    {
        $this->userService->handleDeleteUser($id);
        return back();
    }
}
