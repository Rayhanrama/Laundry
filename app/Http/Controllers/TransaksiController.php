<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelpers;
use App\Models\Customer;
use App\Models\Jenis;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:transaksi-list|transaksi-create|transaksi-edit|transaksi-delete',['only' => ['index','store']]);
        $this->middleware('permission:transaksi-create', ['only' => ['create','store']]);
        $this->middleware('permission:transaksi-edit',['only' => ['edit','update']]);
        $this->middleware('permission:transaksi-delete',['only' => ['destroy']]);

    }
    public function index() {
        $transaksi = Transaksi::latest()->paginate(5);
        return view('transaksi.index',compact('transaksi'))
                    ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function create() {
        $jeniss = Jenis::all();
        return view('transaksi.create', compact('jeniss'));
    }
    
    public function store(Request $request)  {
       
        // $request->validate([
        //     'pembayaran' => 'required',
        //     'nama' => 'required',
        //     'telp' => 'required',
        //     'id_jenis' => 'required',
        //     'status' => 'required',
        //     'total' => 'required|numeric'
        // ]);
        

        
        // Mengambil harga paket berdasarkan id_jenis yg dipilih
        $jenis_paket = Jenis::find($request->id_jenis);
        $harga = $jenis_paket->harga;
        
        // Hitung Total 
        $total = $harga * $request->berat;
        
        Transaksi::create([
            'tanggal' => $request->tanggal,
            'pembayaran' => $request->pembayaran,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'berat' => $request->berat,
            'id_jenis' => $request->id_jenis,
            'status' => $request->status,
            'total' => $total,
        ]);

        Customer::create([
            'nama' => $request->nama,
            'telp' => $request->telp,
        ]);


        return redirect()->route('transaksi.index')
                        ->with('success','Transaksi Berhasil Ditambahkan');
    }

    public function show($id) {
        $id = EncryptionHelpers::decrypt($id);
        $transaksi = Transaksi::find($id);
        return view('transaksi.show',compact('transaksi'));
    }

    public function edit($id)  {
        $jeniss = Jenis::all();
        $id = EncryptionHelpers::decrypt($id);
        $transaksi = Transaksi::find($id);
        return view('transaksi.edit',compact('transaksi','jeniss'));
    }

    public function update(Request $request,$id)  {
        // $request->validate([
        //     'pembayaran' => 'required',
        //     'nama' => 'required',
        //     'jenis' => 'required',
        //     'status' => 'required',
        // ]);
        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Transaksi tidak ditemukan');
        }
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')->with('success','Transaksi Berhasil Diupdate');
    }

    public function destroy($id) {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')
                        ->with('success','Transaksi Berhasil Dihapus');
    }

}

