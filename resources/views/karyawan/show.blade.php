@extends('layouts.app')
@section('content')
    <div class=" mx-3 mt-3 p-4 rounded " style="border: 1px solid rgba(117, 151, 219, 0.262); ">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show User</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('karyawan.index') }}"> Back</a>
                </div>
            </div>
        </div>
        
        <table class="table my-3">

            <tbody>
              <tr>
                <th scope="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>  
                    </div>
                </div>
                </th>
                <td>{{ $user->name }}</td>
              </tr>
  
              <tr>
                <th scope="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>  
                        </div>
                    </div>
                </th>
                <td>{{ $user->email }}</td>
              </tr>
  
              <tr>
                  <th scope="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Roles:</strong>  
                          </div>
                      </div>
                  </th>
                  <td> 
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                         {{ $v }}
                        @endforeach
                    @endif
                    </td>
             </tr>
  
  
            </tbody>
          </table>
        
    </div>
@endsection

