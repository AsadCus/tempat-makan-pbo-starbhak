<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MejaService;

class MejaController extends Controller
{
    public function __construct(MejaService $mejaService)
    {
        $this->mejaService = $mejaService;
    }

    public function index()
    {
        $meja = $this->mejaService->handleAllMeja();
        return view('parsial.meja', [
            'meja' => $meja
        ]);
    }

    public function store(Request $request)
    {
        $this->mejaService->handleStoreMeja($request);
        return back();
    }

    public function destroy($id)
    {
        $this->mejaService->handleDeleteMeja($id);
        return back();
    }

    public function deactive(Request $request, $id)
    {
        $this->mejaService->handleStatusMeja($request, $id);
        return back();
    }
}
