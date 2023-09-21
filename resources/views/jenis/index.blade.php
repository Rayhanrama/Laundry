@extends('layouts.app')
@section('content')
    <div class="mx-3 mt-3 p-4 rounded" style="border: 1px solid rgba(117, 151, 219, 0.262);">
        
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-start mb-3">
                    <h2>Jenis Paket</h2>
                </div>
                <div class="float-end mb-4">
                    @can('jenis-create')
                    <a class="btn btn-success" href="{{ route('jenis.create') }}"> Create New Data</a>
                    @endcan
                </div>
            </div>
        </div>
        
        <table class="table table-bordered">
            <tr class="bg-info text-center text-white">
                <th>No</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($jenis as $item)
            @php
                $data = App\Helpers\EncryptionHelpers::encrypt($item->id);
            @endphp
            <tr class="text-center">
                <td>{{ ++$i }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->harga }}</td>
                <td>
                    <form action="{{ route('jenis.destroy',$item->id) }}" method="POST">
        
                        <a class="btn btn-success" href="{{ route('jenis.show',$data) }}">Show</a>
                        
                        @can('jenis-edit')
                        <a class="btn btn-warning" href="{{ route('jenis.edit',$data) }}">Edit</a>
                        @endcan
        
                        @csrf
                        @method('DELETE')
                        @can('jenis-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="row text-center">
            {!! $jenis->links() !!}
        </div>
    </div>
@endsection

