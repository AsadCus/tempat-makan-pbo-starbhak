<?php

namespace App\Services;

use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisService
{
    public function __construct(Jenis $jenis)
    {
        $this->jenis = $jenis;
    }

    public function handleGetJenis()
    {
        $jenis = $this->jenis->all();
        return($jenis);
    }
}
