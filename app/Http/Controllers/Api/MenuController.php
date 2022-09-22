<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        // $menus = Menu::all();
        $menus = Menu::with('jenis')->with('resto')->get();

        return response()->json($menus);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_menu' => 'required',
            'harga'     => 'required',
            'status'    => 'required',
            'jenis_id'  => 'required',
            'resto_id'  => 'required',
        ]);

        if ($validator->passes()) {
            $menus = Menu::create($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $menus
            ]);
        }

        return response()->json([
            'message' => 'Data Gagal Disimpan',
            'data' => $validator->errors()->all()
        ]);
    }

    public function show($menu)
    {
        // $menus = Menu::where('id', $menu)->first();
        $menus = Menu::with('jenis')->with('resto')->where('id', $menu)->first();

        return response()->json($menus);
    }

    public function update(Request $request, Menu $menu)
    {
        $menu->update($request->all());

        return response()->json([
            'message' => 'Data Berhasil Diedit',
            'data' => $menu
        ]);
    }

    public function destroy($id)
    {
        $data = Menu::where('id', $id)->first();

        if (empty($data)) {
            return response()->json(['message' => 'Data Tidak Ditemukan'], 404);    
        }

        $data->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus'], 200);
    }
}
