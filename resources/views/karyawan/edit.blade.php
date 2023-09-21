@extends('layouts.app')
@section('content')
    <div class="mx-3 mt-3 p-4 rounded " style="border: 1px solid rgba(117, 151, 219, 0.262); ">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit New User</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('karyawan.index') }}"> Back</a>
                </div>
            </div>
        </div>
        
        
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong.<br><br>
            <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
            </ul>
          </div>
        @endif
        
        
        {!! Form::model($user, ['method' => 'PATCH','route' => ['karyawan.update', $user->id]]) !!}
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection

