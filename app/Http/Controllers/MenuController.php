<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuService;
use App\Services\JenisService;

class MenuController extends Controller
{
    public function __construct(MenuService $menuService, JenisService $jenisService)
    {
        $this->menuService = $menuService;
        $this->jenisService = $jenisService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_makanan = $this->menuService->handleMenuMakanan();
        $menu_minuman = $this->menuService->handleMenuMinuman();
        $menu = $this->menuService->handleMenu();
        $jenis = $this->jenisService->handleGetJenis();
        return view('parsial.menu', [
            'menu_makanan' => $menu_makanan,
            'menu_minuman' => $menu_minuman,
            'menu' => $menu,
            'jenis' => $jenis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->menuService->handleStoreMenu($request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->menuService->handleUpdateMenu($request, $id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->menuService->handleDeleteMenu($id);
        return back();
    }

    public function deactive(Request $request, $id)
    {
        $this->menuService->handleStatusMenu($request, $id);
        return back();
    }
}
