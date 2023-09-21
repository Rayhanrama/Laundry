@extends('layouts.app')
@section('content')
    <div class="mx-4 mt-4 p-3" style="border: 1px solid rgba(117, 151, 219, 0.262);">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="mb-3">
                    <h2> Show Data</h2>
                </div>
                <div class="mb-5">
                    <a class="btn btn-primary" href="{{ route('transaksi.index') }}"> Back</a>
                </div>
            </div>
        </div>
            <table class="table">

                <tbody>
                  <tr>
                    <th scope="row"> 
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tanggal:</strong>  
                        </div>
                    </div>
                    </th>
                    <td>{{ $transaksi->tanggal }}</td>
                  </tr>
      
                  <tr>
                    <th scope="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Pembayaran:</strong>  
                            </div>
                        </div>
                    </th>
                    <td>{{ $transaksi->pembayaran }}</td>
                  </tr>
      
                  <tr>
                      <th scope="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Nama:</strong>  
                              </div>
                          </div>
                      </th>
                      <td>{{ $transaksi->nama }}</td>
                    </tr>
      
                    <tr>
                      <th scope="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>No Telpon:</strong>  
                              </div>
                          </div>
                      </th>
                      <td>{{ $transaksi->telp }}</td>
                    </tr>

                    
                    <tr>
                        <th scope="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Berat:</strong>  
                                </div>
                            </div>
                        </th>
                        <td>{{ $transaksi->berat }} kg</td>
                      </tr>
        
      
                    <tr>
                      <th scope="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Jenis:</strong>  
                              </div>
                          </div>
                      </th>
                      <td>{{ $transaksi->jenis->jenis }}</td>
                    </tr>
      
                    <tr>
                      <th scope="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Status:</strong>  
                              </div>
                          </div>
                      </th>
                      <td>{{ $transaksi->status }}</td>
                    </tr>
      
                    <tr>
                      <th scope="row">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                  <strong>Total:</strong>  
                              </div>
                          </div>
                      </th>
                      <td>{{ $transaksi->total }}</td>
                    </tr>
      
                </tbody>
              </table>
        
    </div>
@endsection
