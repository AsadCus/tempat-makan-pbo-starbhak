<?php

namespace App\Http\Controllers;

use App\Services\MejaService;
use App\Services\PesananService;
use Illuminate\Http\Request;


class PesananController extends Controller
{
    public function __construct(PesananService $pesananService, MejaService $mejaService)
    {
        $this->pesananService = $pesananService;
        $this->mejaService = $mejaService;
    }

    public function index()
    {
        $pesanan = $this->pesananService->handleAllPesanan();
        return view('parsial.pesanan', [
            'pesanan' => $pesanan,
        ]);
    }

    public function show($id)
    {
        $data = $this->pesananService->handleShowDetailPesanan($id);
        return($data);
    }

    public function store(Request $request)
    {
        // $tes = $this->pesananService->handleStorePesanan($request);
        // return($tes);
        $a = 'Rp.20.000';
        $b = 'Rp.12.000';
        // $str = 'In My Cart : 11 items';
        $a = (int) filter_var($a, FILTER_SANITIZE_NUMBER_INT);
        $b = (int) filter_var($b, FILTER_SANITIZE_NUMBER_INT);
    }

    public function bayar(Request $request, $id)
    {
        $this->pesananService->handleDeactivePesanan($id);
        $this->mejaService->handleTersediaMeja($request);
        return back();
    }
}
