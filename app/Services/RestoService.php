<?php

namespace App\Services;

use App\Models\Resto;
use Illuminate\Http\Request;

class RestoService
{
    public function __construct(Resto $resto)
    {
        $this->resto = $resto;
    }

    public function handleResto ()
    {
        return $this->resto->all();
    }

    public function handleUpdateResto ($request, $id)
    {
        $resto = $this->resto->find($id);
        $data = $resto->update($request->all());

        return response()->json($data, 200);
    }
}
