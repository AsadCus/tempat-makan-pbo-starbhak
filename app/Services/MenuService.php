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
        $menu = $this->menu->with('jenis')->with('resto')->get();
        return($menu);
    }

    public function handleMenuMakanan()
    {
        // $menu_makanan = $this->menu->with('jenis')->with('resto')->where('jenis_id', 1)->paginate(5);
        $menu_makanan = $this->menu->with('jenis')->with('resto')->where('jenis_id', 1)->get();
        return($menu_makanan);
    }

    public function handleMenuMinuman()
    {
        // $menu_minuman = $this->menu->with('jenis')->with('resto')->where('jenis_id', 2)->paginate(5);
        $menu_minuman = $this->menu->with('jenis')->with('resto')->where('jenis_id', 2)->get();
        return($menu_minuman);
    }

    public function handleStoreMenu(Request $request)
    {
        $menuData = $request->validate([
            'nama_menu' => 'required',
            'harga'     => 'required',
            'status'    => '',
            'jenis_id'  => 'required',
            'resto_id'  => '',
        ]);

        $menuData['status'] = "tersedia";
        $menuData['resto_id'] = 1;

        $this->menu->create($menuData);
    }

    public function handleUpdateMenu(Request $request, $id)
    {
        // $this->menu->find($request->id)->update($request->all());
        $this->menu->find($id)->update($request->all());
    }

    public function handleDeleteMenu($id)
    {
        $data = Menu::where('id', $id)->first();
        $data->delete();
    }

    public function handleStatusMenu($request, $id)
    {
        if ($request->status == 'tersedia') {
            $menu = $this->menu->find($id);
            $menu->status = 'kosong';
            $menu->save();
            return ($menu);
        } else {
            $menu = $this->menu->find($id);
            $menu->status = 'tersedia';
            $menu->save();
            return ($menu);
        }
    }
}
