<?php

namespace App\Http\Controllers;

use App\Services\RestoService;
use App\Services\MenuService;
use Illuminate\Http\Request;                                                                        

class HomeController extends Controller
{
    public function __construct(MenuService $menuService, RestoService $restoService)
    {
        $this->menuService = $menuService;
        $this->restoService = $restoService;
    }

    public function index()
    {
        $restos = $this->restoService->handleResto();
        $menu = $this->menuService->handleMenu();
        return view('parsial.home', [
            'menu' => $menu,
            'restos' => $restos
        ]);
    }
}
