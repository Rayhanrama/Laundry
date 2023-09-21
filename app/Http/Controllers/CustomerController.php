<?php

namespace App\Http\Controllers;

use App\Helpers\EncryptionHelpers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete',['only' => ['index','store']]);
        $this->middleware('permission:customer-delete',['only' => ['destroy']]);

    }

    public function index() {
        $customer = Customer::latest()->paginate(5);
        return view('customer.index',compact('customer'))
                    ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    // public function create()  {
    //     return view('customer.index');
    // }

    // public function store(Request $request) {
    //     $request->validate([
    //         'nama' => 'required',
    //         'telp' => 'required|numeric', 
    //     ]);

    //     Customer::create($request->all());

    //     return redirect('customer.index')
    //                     ->with('success','Behasil Ditambahkan');
    // }

    public function show($id)  {
        $id = EncryptionHelpers::decrypt($id);
        $customer = Customer::find($id);
        return view('customer.show',compact('customer'));
    }

    // public function edit($id) {
    //     $customer = Customer::find($id);
    //     return view('customer.index',compact('customer'));
    // }

    // public function update(Request $request, $id) {
    //     $request->validate([
    //         'nama' => 'required',
    //         'telp' => 'required|numeric',
    //     ]);

    //     $customer = Customer::find($id);
    //     $customer->update($request->all());

    //     return redirect('customer.index')
    //                     ->with('success','Berhasil Diubah');
    // }

    public function destroy($id)  {
        
        $customer = Customer::find($id);

        $customer->delete();

        return redirect()->route('customer.index')
                        ->with('success','Berhasil Dihapus');
    }
}
