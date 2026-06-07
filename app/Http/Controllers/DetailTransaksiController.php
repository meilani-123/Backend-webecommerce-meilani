<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Validator;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = DetailTransaksi::all();

        return response()->json($detail);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transaksi_id' => 'required|exists:transaksi,transaksi_id',
            'produk_id' => 'required|exists:produk,produk_id',
            'jumlah_barang' => 'required',
            'harga_satuan' => 'required',
            'subtotal' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()
            ], 422);
        }

        $detail = new DetailTransaksi;
        $detail->fill($request->all());
        $simpan = $detail->save();

        if ($simpan) {
            return response()->json([
                'status' => 'success'
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'Gagal menyimpan data'
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'transaksi_id' => 'required|exists:transaksi,transaksi_id',
            'produk_id' => 'required|exists:produk,produk_id',
            'jumlah_barang' => 'required',
            'harga_satuan' => 'required',
            'subtotal' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()
            ], 422);
        }

        $detail = DetailTransaksi::find($id);

        if (!$detail) {
            return response()->json([
                'status' => 'error',
                'error' => 'Data tidak ditemukan'
            ], 422);
        }

        $detail->fill($request->all());
        $simpan = $detail->save();

        if ($simpan) {
            return response()->json([
                'status' => 'success'
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'Gagal menyimpan data'
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = DetailTransaksi::find($id);

        if (!$detail) {
            return response()->json([
                'status' => 'error',
                'error' => 'Data tidak ditemukan'
            ], 422);
        }

        $hapus = $detail->delete();

        if ($hapus) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ], 201);
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'Gagal menghapus data'
            ], 422);
        }
    }
}
