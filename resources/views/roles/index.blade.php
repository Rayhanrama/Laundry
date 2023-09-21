@extends('layouts.app')
@section('content')

    <div class=" mx-3 mt-3 p-4 rounded" style="border: 1px solid rgba(117, 151, 219, 0.262);">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Role Management</h2>
                </div>
                <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                    @endcan
                </div>
            </div>
        </div>
        
        <table class="table table-bordered my-4">
          <tr class="bg-info text-center text-white">
             <th>No</th>
             <th>Name</th>
             <th width="280px">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            @php
                $data = App\Helpers\EncryptionHelpers::encrypt($role->id);
            @endphp
            <tr class="text-center">
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('roles.show',$data) }}">Show</a>
                    @can('role-edit')
                        <a class="btn btn-primary" href="{{ route('roles.edit',$data) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            @endforeach
        </table>
        
        {!! $roles->render() !!}
    </div>
@endsection

