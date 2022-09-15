<?php

namespace App\Services;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuService
{
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function handleMenu()
    {
        $menu = $this->menu->with('jenis')->with('resto')->paginate(10);
        return($menu);
    }

    public function handleMenuMakanan()
    {
        $menu_makanan = $this->menu->with('jenis')->with('resto')->where('jenis_id', '=', 1)->paginate(10);
        return($menu_makanan);
    }

    public function handleMenuMinuman()
    {
        $menu_minuman = $this->menu->with('jenis')->with('resto')->where('jenis_id', '=', 2)->paginate(10);
        return($menu_minuman);
    }
}
