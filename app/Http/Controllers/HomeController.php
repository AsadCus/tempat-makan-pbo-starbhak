<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use App\Services\PesananService;
use App\Services\UserService;
use Illuminate\Http\Request;                                                                        

class HomeController extends Controller
{
    public function __construct(MenuService $menuService, PesananService $pesananService, UserService $userService)
    {
        $this->menuService = $menuService;
        $this->pesananService = $pesananService;
        $this->userService = $userService;
    }

    public function index()
    {
        $pesanan = $this->pesananService->handleAllPesanan();
        $menu = $this->menuService->handleMenu();
        $user = $this->userService->handleAllUser();
        return view('parsial.home', [
            'menu' => $menu,
            'pesanan' => $pesanan,
            'user' => $user,
        ]);
    }
}
