<?php

namespace App\Http\Controllers;

use App\Services\PesananService;
use Illuminate\Http\Request;


class PesananController extends Controller
{
    public function __construct(PesananService $pesananService)
    {
        $this->pesananService = $pesananService;
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
}
