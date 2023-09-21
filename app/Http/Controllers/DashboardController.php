<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Jenis;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()  {
        $transaksi = Transaksi::all();
        $user = User::all();
        $data = Jenis::all();
        $customer = Customer::all();
        $total = Transaksi::where('pembayaran', 'Lunas')->sum('total');
        return view('dashboard',compact('transaksi','user','data','customer','total'))
        ->with('i',(request()->input('page', 1) - 1) * 5);
    }
}
