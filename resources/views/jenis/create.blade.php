@extends('layouts.app')
@section('content')
    <div class="mx-3 mt-3 p-4 rounded" style="border: 1px solid rgba(117, 151, 219, 0.262);">
        
             <!-- START FORM -->
             <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div>
                        <h2>Add New Data</h2>
                    </div>
                    <div class="mb-3">
                        <a class="btn btn-primary" href="{{ route('jenis.index') }}"> Back</a>
                    </div>
                </div>
            </div>
               
               
            <form action="{{ route('jenis.store') }}" method="POST">
                @csrf
              
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jenis:</strong>
                            <input type="text" name="jenis" class="form-control" placeholder="Jenis">
                        </div>
                    </div>
        
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Harga:</strong>
                            <input class="form-control" name="harga" placeholder="Harga">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
               
            </form>

    </div>
@endsection

