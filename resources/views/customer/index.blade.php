@extends('layouts.app')
@section('content')
           
    <div class="mx-4 mt-4 p-3" style="border: 1px solid rgba(117, 151, 219, 0.262);">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Customer Management</h2>
                </div>
                <div class="pull-right">
                   {{-- <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a> --}}
                </div>
            </div>
        </div>
        <table class="table table-bordered mt-3">
            <tr  class="bg-info text-center text-white">
                <th>No</th>
                <th>Nama</th>
                <th>No Telpon</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($customer as $item)
            @php
                $data = App\Helpers\EncryptionHelpers::encrypt($item->id);
            @endphp
            <tr class="text-center">
                <td>{{ ++$i }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->telp }}</td>
                <td>
                    <form action="{{ route('customer.destroy',$item->id) }}" method="POST">
        
                        <a class="btn btn-success" href="{{ route('customer.show',$data) }}">Show</a>
        
                        {{-- <a class="btn btn-primary" href="{{ route('jenis.edit',$item->id) }}">Edit</a> --}}
        
                        @csrf
                        @method('DELETE')
          
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="row text-center">
            {!! $customer->links() !!}
        </div>
    </div>
@endsection

