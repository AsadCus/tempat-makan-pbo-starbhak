<?php

namespace App\Services;

use App\Models\DetailPesanan;
use Illuminate\Http\Request;

class DetailPesananService
{
    public function __construct(DetailPesanan $detailPesanan)
    {
        $this->detailPesanan = $detailPesanan;
    }
}
