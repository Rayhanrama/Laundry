<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelpers;
use App\Models\Jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:jenis-list|jenis-create|jenis-edit|jenis-delete',['only' => ['index','store']]);
        $this->middleware('permission:jenis-create', ['only' => ['create','store']]);
        $this->middleware('permission:jenis-edit',['only' => ['edit','update']]);
        $this->middleware('permission:jenis-delete',['only' => ['destroy']]);

    }

    public function index()  {
        $jenis = Jenis::latest()->paginate(5);
        return view('jenis.index',compact('jenis'))
                    ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function create()  {
        return view('jenis.create');
    }

    public function store(Request $request)  {
        
        $request->validate([
            'jenis' => 'required',
            'harga' => 'required|numeric',
        ],[
            'jenis.required' => 'Wajib Diisi',
            'harga.required' => 'Wajib Diisi',
            'harga.numeric' => 'Wajib Diisi dengan angka',
        ]);

        Jenis::create($request->all());

        return redirect()->route('jenis.index')
                        ->with('success','Jenis Berhasil Ditambahkan');

    }

    public function show($id) {
        $id = EncryptionHelpers::decrypt($id);
        $jenis = Jenis::find($id);
        return view('jenis.show',compact('jenis'));
    }

    public function edit($id)  {
        $id = EncryptionHelpers::decrypt($id);
        $jenis = Jenis::find($id);
        return view('jenis.edit',[
            'jenis' => $jenis
        ]);
    }

    public function update(Request $request, $id)  {
        
        $request->validate([
            'jenis' => 'required',
            'harga' => 'required|numeric',
        ]);

        $jenis = Jenis::find($id);
        $jenis->update($request->all());
        return redirect()->route('jenis.index')
                        ->with('success','Jenis Berhasil Diupdate');
    }

    public function destroy($id)  {
        $jenis = Jenis::find($id);
        $jenis->delete();

        return redirect()->route('jenis.index')
                        ->with('success','Jenis Berhasil Didelete');
    }
}
