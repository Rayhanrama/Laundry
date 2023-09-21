@extends('layouts.app')
        @section('content')
        <div class="mx-4 mt-4 p-3" style="border: 1px solid rgba(117, 151, 219, 0.262);">
            
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="mb-3">
                        <h2>Edit Data</h2>
                    </div>
                    <div class="mb-3">
                        <a class="btn btn-primary" href="{{ route('transaksi.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            
            
            
            <form action="{{ route('transaksi.update',$transaksi->id) }}" method="POST">
                @csrf
                @method('PATCH')
            
                 <div class="row">
              
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Tanggal:</strong>
                            <input type="date" name="jenis" value="{{ $transaksi->tanggal }}" class="form-control">
                        </div>
                    </div>
        
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Pembayaran:</strong>
                            <select name="pembayaran" id="pembayaran" class="form-control select2">
                                <option selected disabled ="">-- Jenis --</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum lunas">Belum lunas</option>
                               </select>
                        </div>
                    </div>
        
                    
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Nama:</strong>
                            <input class="form-control" name="nama" placeholder="nama" value="{{ $transaksi->nama }}">
                        </div>
                    </div>
        
                    
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>No Telpon:</strong>
                            <input class="form-control" name="telp" placeholder="telp" value="{{ $transaksi->telp }}">
                        </div>
                    </div>

                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Berat:</strong>
                            <input class="form-control" name="berat" placeholder="berat" value="{{ $transaksi->berat }}">
                        </div>
                    </div>
        
                    
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Jenis:</strong>
                            <select name="id_jenis" id="id_jenis" class="form-control select2">
                                <option selected disabled ="">-- Jenis --</option>
                                    @foreach ($jeniss as $jenis)
                                        <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                                    @endforeach
                               </select>
                        </div>
                    </div>
        
                    
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Status:</strong>
                            <select name="status" id="status" class="form-control select2">
                                <option selected disabled value="">-- Status --</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Proses">Proses</option>
                                    <option value="Belum Selesai">Belum Selesai</option>
                            </select>
                        </div>
                    </div>
        
                    
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <strong>Total:</strong>
                            <input class="form-control" name="total" placeholder="total" value="{{ $transaksi->total }}">
                        </div>
                    </div>
        
        
                    <div class="col-xs-5 col-sm-5 col-md-5 text-center mt-3">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            
            </form>
            
        </div>
        @endsection
    
    