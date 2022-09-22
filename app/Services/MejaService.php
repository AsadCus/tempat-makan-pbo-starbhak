<?php

namespace App\Services;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaService
{
    public function __construct(Meja $meja)
    {
        $this->meja = $meja;
    }

    public function handleAllMeja()
    {
        $meja = $this->meja->paginate(5);
        // $meja = $this->meja->all();
        return($meja);
    }

    public function handleStoreMeja(Request $request)
    {
        $validateData = $request->validate([
            'no_meja' => 'required',
        ]);

        $validateData['status'] = "tersedia";
        // dd($validateData);
        $this->meja->create($validateData);
    }

    public function handleStatusMeja($request, $id)
    {
        if ($request->status == 'tersedia') {
            $meja = $this->meja->find($id);
            $meja->status = 'dipesan';
            $meja->save();
            return ($meja);
        } else {
            $meja = $this->meja->find($id);
            $meja->status = 'tersedia';
            $meja->save();
            return ($meja);
        }
    }

    public function handleDeleteMeja($id)
    {
        $data = Meja::where('id', $id)->first();
        $data->delete();
    }
}
