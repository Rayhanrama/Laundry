@extends('layouts.app')
@section('content')
    <div class="mx-3 mt-3 p-4 rounded" style="border: 1px solid rgba(117, 151, 219, 0.262);">

      <div class="row">
          <div class="col-lg-12 margin-tb">
              <div class="mb-3">
                  <h2> Show Data</h2>
              </div>
              <div class="mb-4">
                  <a class="btn btn-primary" href="{{ route('jenis.index') }}"> Back</a>
              </div>
          </div>
      </div>
          <table class="table">
              <tbody>
                <tr>
                  <th scope="row"> 
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Jenis:</strong>  
                      </div>
                  </div>
                  </th>
                  <td>{{ $jenis->jenis }}</td>
                </tr>
                <tr>
                  <th scope="row">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-group">
                              <strong>Harga:</strong>  
                          </div>
                      </div>
                  </th>
                  <td>{{ $jenis->harga }}</td>
                </tr>
              </tbody>
            </table>
    </div>
@endsection

