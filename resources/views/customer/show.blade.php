@extends('layouts.app')
@section('content')
    <div class="mx-4 mt-4 p-3" style="border: 1px solid rgba(117, 151, 219, 0.262);">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="mb-3">
                    <h2> Show Data</h2>
                </div>
                <div class="mb-5">
                    <a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>
                </div>
            </div>
        </div>
            <table class="table">

                <tbody>
                  <tr>
                    <th scope="row"> 
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama:</strong>  
                        </div>
                    </div>
                    </th>
                    <td>{{ $customer->nama }}</td>
                  </tr>
      
                  <tr>
                    <th scope="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>No Telpon:</strong>  
                            </div>
                        </div>
                    </th>
                    <td>{{ $customer->telp }}</td>
                  </tr>
      
      
                </tbody>
              </table>
        
    </div>
@endsection
