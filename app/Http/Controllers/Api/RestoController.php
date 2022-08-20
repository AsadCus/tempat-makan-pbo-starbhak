<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resto;
use Illuminate\Support\Facades\Validator;

class RestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restos = Resto::all();

        return response()->json($restos);
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
            'nama_resto' => 'required',
            'profil' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->passes()) {
            $resto = Resto::create($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $resto
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
    public function show($resto)
    {
        $restos = Resto::where('id', $resto)->first();

        return response()->json($restos);
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
    public function update(Request $request, Resto $resto)
    {
        $resto->update($request->all());

        return response()->json([
            'message' => 'Data Berhasil Diedit',
            'data' => $resto
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($resto)
    {
        $data = Resto::where('id', $resto)->first();
        if (empty($data)) {
            return response()->json(['message' => 'Data Tidak Ditemukan'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus'], 200);
    }
}
