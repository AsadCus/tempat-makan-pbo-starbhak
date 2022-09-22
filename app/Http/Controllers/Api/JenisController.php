<?php

namespace App\Http\Controllers\Api;

use App\Models\Jenis;
use Illuminate\Http\Request;
use App\Services\JenisService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JenisController extends Controller
{
    public function __construct(JenisService $jenisService)
    {
        $this->jenisService = $jenisService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = $this->jenisService->handleGetJenis();
        return response()->json($jenis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'jenis' => 'required',
        ]);

        if ($validator->passes()) {
            $jenis = Jenis::create($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $jenis
            ]);
        }

        return response()->json([
            'message' => 'Data Gagal Disimpan',
            'data' => $validate->errors()->all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($jenis)
    {
        $jenis = Jenis::where('id', $jenis)->first();

        return response()->json($jenis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis $jenis)
    {
        $jenis->update($request->all());

        return response()->json([
            'message' => 'Data Berhasil Diedit',
            'data' => $jenis
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jenis)
    {
        $data = Jenis::where('id', $jenis)->first();
        if (empty($data)) {
            return response()->json(['message' => 'Data Tidak Ditemukan'], 404);    
        }

        $data->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus'], 200);
    }
}
