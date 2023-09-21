{{-- @dd($transaksi[0]->jenis->jenis) --}}

@extends('layouts.app')
@section('content')

<div class=" mx-3 mt-3 p-4 rounded " style="border: 1px solid rgba(117, 151, 219, 0.262); ">
    <div class="row ">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transaksi Management</h2>
            </div>
            <div class="pull-right">
            @can('transaksi-create')
                <a class="btn btn-success" href="{{ route('transaksi.create') }}"> Create New Transaksi</a>
                @endcan
            </div>
        </div>
    </div>
    



<table class="table table-bordered my-4">
<tr class="bg-info  text-center text-white">
 <th>No</th>
 <th>Tanggal</th>
 <th>Pembayaran</th>
 <th>Nama</th>
 <th>No Telpon</th>
 <th>Total</th>
 {{-- <th>Berat</th>
 <th>Jenis</th>
 <th>Status</th>
 <th>Total</th> --}}
 <th width="280px">Action</th>
</tr>
@foreach ($transaksi as  $item)
    @php
        $data = App\Helpers\EncryptionHelpers::encrypt($item->id);
    @endphp
<tr class="text-center">
    <td>{{ ++$i }}</td>
    <td>{{ $item->tanggal }}</td>
    <td>
        @if ($item->pembayaran == 'Lunas')
            <button class="btn btn-success">{{ $item->pembayaran }}</button>
        @else
            <button class="btn btn-danger">{{ $item->pembayaran }}</button>
        @endif
    </td>
    
    <td>{{ $item->nama }}</td>
    <td>{{ $item->telp }}</td>
    <td>RP. {{ $item->total }}</td>
    {{-- <td>{{ $item->berat }}kg</td>
    <td>{{ $item->jenis->jenis }}</td>
    <td>{{ $item->status }}</td>
    <td>{{ $item->total }}</td> --}}
    <td >
        <a class="btn btn-success" href="{{ route('transaksi.show',$data) }}">Show</a>
        @can('transaksi-edit')
            <a class="btn btn-warning text-black" href="{{ route('transaksi.edit',$data) }}">Edit</a>
        @endcan
        @can('transaksi-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['transaksi.destroy', $item->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endcan
    </td>
</tr>
@endforeach
</table>

{!! $transaksi->render() !!}
</div>



@endsection

    