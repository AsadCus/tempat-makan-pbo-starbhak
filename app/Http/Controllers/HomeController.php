<?php

namespace App\Http\Controllers;

use App\Services\MenuService;
use Illuminate\Http\Request;                                                                        

class HomeController extends Controller
{
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        $menu = $this->menuService->handleMenu();
        return view('parsial.home', [
            'menu' => $menu,
        ]);
    }
}
