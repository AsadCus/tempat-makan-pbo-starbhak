<?php

namespace App\Http\Controllers;

use App\Services\RestoService;
use App\Services\MenuService;
use App\Services\PesananService;
use App\Services\UserService;
use Illuminate\Http\Request;                                                                        

class HomeController extends Controller
{
<<<<<<< HEAD
    public function __construct(MenuService $menuService, PesananService $pesananService, UserService $userService)
    {
        $this->menuService = $menuService;
        $this->pesananService = $pesananService;
        $this->userService = $userService;
=======
    public function __construct(MenuService $menuService, RestoService $restoService)
    {
        $this->menuService = $menuService;
        $this->restoService = $restoService;
>>>>>>> cdb5b903df1679b17e49b575641e8dd99a48ec65
    }

    public function index()
    {
<<<<<<< HEAD
        $pesanan = $this->pesananService->handleAllPesanan();
=======
        $restos = $this->restoService->handleResto();
>>>>>>> cdb5b903df1679b17e49b575641e8dd99a48ec65
        $menu = $this->menuService->handleMenu();
        $user = $this->userService->handleAllUser();
        return view('parsial.home', [
            'menu' => $menu,
<<<<<<< HEAD
            'pesanan' => $pesanan,
            'user' => $user,
=======
            'restos' => $restos
>>>>>>> cdb5b903df1679b17e49b575641e8dd99a48ec65
        ]);
    }
}
