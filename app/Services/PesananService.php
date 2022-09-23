<?php

namespace App\Services;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananService
{
    public function __construct(Pesanan $pesanan)
    {
        $this->pesanan = $pesanan;
    }

    public function handleAllPesanan()
    {
        $data = $this->pesanan->with('user')->get();
        return($data);
    }

    public function handleShowDetailPesanan($id)
    {
        $data = $this->pesanan->with('user', 'detail_pesanan')->get();
        dd($data);
        return($data);
    }

    public function handleStorePesanan(Request $request)
    {
        $this->pesanan->create();
    }

    public function handleUpdatePesanan(Request $request, $id)
    {
        $this->pesanan->find($id)->update($request->all());
    }

    public function handleDeletePesanan($id)
    {
        $pesanan = $this->pesanan->find($id);
        $pesanan->delete();
    }

    public function handleStatusPesanan($id)
    {
        # code...
    }
}
