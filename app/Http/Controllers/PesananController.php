<?php

namespace App\Http\Controllers;

use App\Services\MejaService;
use App\Services\MenuService;
use App\Services\PesananService;
use Illuminate\Http\Request;


class PesananController extends Controller
{
    public function __construct(PesananService $pesananService, MejaService $mejaService, MenuService $menuService)
    {
        $this->pesananService = $pesananService;
        $this->mejaService = $mejaService;
        $this->menuService = $menuService;
    }

    public function index()
    {
        $kode = $this->pesananService->handleKodePesanan();
        $meja = $this->mejaService->handleAllMeja();
        $pesanan = $this->pesananService->handleAllPesanan();
        $menu = $this->menuService->handleMenu();
        return view('parsial.pesanan', [
            'pesanan' => $pesanan,
            'meja' => $meja,
            'kode' => $kode,
            'menu' => $menu,
        ]);
    }

    public function show($id)
    {
        $data = $this->pesananService->handleShowDetailPesanan($id);
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // $tes = $this->pesananService->handleStorePesanan($request);
        // return($tes);
        // $a = 'Rp.20.000';
        // $b = 'Rp.12.000';
        // $str = 'In My Cart : 11 items';
        // $a = (int) filter_var($a, FILTER_SANITIZE_NUMBER_INT);
        // $b = (int) filter_var($b, FILTER_SANITIZE_NUMBER_INT);
    }

    public function bayar(Request $request, $id)
    {
        $this->pesananService->handleDeactivePesanan($id);
        $this->mejaService->handleTersediaMeja($request);
        return back();
    }
}
