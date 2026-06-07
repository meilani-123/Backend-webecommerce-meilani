<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();

        return response()->json($transaksi);
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
            'user_id' => 'required|exists:users,id',
            'tanggal_transaksi' => 'required',
            'total_harga' => 'required',
            'metode_pembayaran' => 'required',
            'status_pesanan' => 'required',
            'alamat_pengiriman' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()
            ], 422);
        }

        $transaksi = new Transaksi;
        $transaksi->fill($request->all());
        $simpan = $transaksi->save();

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
            'user_id' => 'required|exists:users,id',
            'tanggal_transaksi' => 'required',
            'total_harga' => 'required',
            'metode_pembayaran' => 'required',
            'status_pesanan' => 'required',
            'alamat_pengiriman' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validator->errors()
            ], 422);
        }

        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return response()->json([
                'status' => 'error',
                'error' => 'Data tidak ditemukan'
            ], 422);
        }

        $transaksi->fill($request->all());
        $simpan = $transaksi->save();

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
        $transaksi = Transaksi::find($id);

    if (!$transaksi) {
        return response()->json([
            'status' => 'error',
            'error' => 'Data tidak ditemukan'
        ], 422);
    }

    $hapus = $transaksi->delete();

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
