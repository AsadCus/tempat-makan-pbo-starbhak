<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RestoService;

class RestoController extends Controller
{
    public function __construct (RestoService $restoService)
    {
        $this->restoService = $restoService;
    }

    public function update (Request $request, $id)
    {
        $this->restoService->handleUpdateResto($request, $id);

        return redirect()->back();
    }
}
