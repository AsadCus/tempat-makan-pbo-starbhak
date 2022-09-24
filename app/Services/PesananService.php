<?php

namespace App\Services;

// use App\Models\Meja;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;

class PesananService
{
    public function __construct(Pesanan $pesanan, DetailPesanan $detailPesanan)
    {
        $this->pesanan = $pesanan;
        $this->detailPesanan = $detailPesanan;
        // $this->meja = $meja;
    }

    public function handleAllPesanan()
    {
        $data = $this->pesanan->with('user')->get();
        return($data);
    }

    public function handleShowDetailPesanan($id)
    {
        $data = $this->detailPesanan->with('menu', 'pesanan')->where('pesanan_id', $id)->get();
        $data = $data->map(function ($item) {
            $item['tanggal'] = str_replace('-', ' ', $item->created_at->format('d-m-Y'));
            return $item;
        });
        return($data);
    }

    public function handleKodePesanan()
    {
        $allpesanans = count($this->pesanan->get());
        $plusplus = $allpesanans + 1;

        if ($allpesanans > 0) {
            if ($allpesanans >= 9) {
                $kode_pesanan = '0' . $plusplus . '/' . 'Makan';
            } else {
                $kode_pesanan = '00' . $plusplus . '/' . 'Makan';
            }
        } else {
            $kode_pesanan = '001' . '/' . 'Makan';
        }

        // dd($kode_pesanan);
        return($kode_pesanan);
    }

    public function handleStorePesanan(Request $request)
    {
        $a = 'Rp.10.000';
        $b = 'Rp.12.000';
        // $str = 'In My Cart : 11 items';
        $a = (int) filter_var($a, FILTER_SANITIZE_NUMBER_INT);
        $b = (int) filter_var($b, FILTER_SANITIZE_NUMBER_INT);
        dd($a + $b);
    }

    // public function handleUpdatePesanan(Request $request, $id)
    // {
    //     $this->pesanan->find($id)->update($request->all());
    // }

    // public function handleDeletePesanan($id)
    // {
    //     $pesanan = $this->pesanan->find($id);
    //     $pesanan->delete();
    // }

    public function handleDeactivePesanan($id)
    {
        $pesanan = $this->pesanan->find($id);
        $pesanan->status = 'close';
        $pesanan->save();
        // return($pesanan);
    }

    public function handlePembayaran()
    {
        
    }
}
