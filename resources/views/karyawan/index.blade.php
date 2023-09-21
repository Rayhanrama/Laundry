@extends('layouts.app')
@section('content')

    <div class=" mx-3 mt-3 p-4 rounded" style="border: 1px solid rgba(117, 151, 219, 0.262);">

      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left">
                  <h2>Users Management</h2>
              </div>
              <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('karyawan.create') }}"> Create New User</a>
              </div>
          </div>
      </div>
      
      <table class="table table-bordered my-4">
       <tr class="bg-info text-center text-white">
         <th>No</th>
         <th>Nama</th>
         <th>Email</th>
         <th>Roles</th>
         <th width="280px">Action</th>
       </tr>
       @foreach ($data as $key => $user)
        @php
            $data = App\Helpers\EncryptionHelpers::encrypt($user->id);
        @endphp
        <tr class="text-center">
          @if(!empty($user->getRoleNames()))
          @foreach($user->getRoleNames() as $v)
            @if($v === 'karyawan')
          <td>{{ ++$i }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>
                <label>{{ $v }} </label>
              </td>
              <td>
                <a class="btn btn-info" href="{{ route('karyawan.show',$data) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('karyawan.edit',$data) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['karyawan.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
              </td>
              @endif
            @endforeach
          @endif
        </tr>
       @endforeach
      </table>
      
    </div>
@endsection
