@extends('layouts.app')
@section('content')
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Total Transaksi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transaksi->count() }}</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          Pemasukan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. {{ $total }}</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total User
                      </div>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $user->count() }}</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Pending Requests Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Jenis Paket</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data->count() }}</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-inbox fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="row">
    <table class="table table-bordered my-4">
        <tr class="bg-info  text-center text-white">
         <th>No</th>
         <th>Tanggal</th>
         <th>Pembayaran</th>
         <th>Nama</th>
         <th>No Telpon</th>
         <th>Total</th>
        </tr>
        @foreach ($transaksi as  $item)
            @php
                $data = App\Helpers\EncryptionHelpers::encrypt($item->id);
            @endphp
        <tr class="text-center">
            <td>{{ ++$i }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->pembayaran }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->telp }}</td>
            <td>RP. {{ $item->total }}</td>
        </tr>
        @endforeach
        </table>
</div>
@endsection