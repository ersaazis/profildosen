@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pengaturan</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('/config') }}" method="POST">
                        @csrf
                          <div class="form-group row">
                            <label for="urlForlap" class="col-sm-2 col-form-label">Url Forlap</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="urlForlap" name="urlForlap" value="{{ $konfigurasi['urlForlap'] }}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="webName" class="col-sm-2 col-form-label">Nama Website</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="webName" name="webName" value="{{ $konfigurasi['webName'] }}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="webKeyWords" class="col-sm-2 col-form-label">Website Keyword</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="webKeyWords" name="webKeyWords" value="{{ $konfigurasi['webKeyWords'] }}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="webSub" class="col-sm-2 col-form-label">Sub Website</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="webSub" name="webSub" value="{{ $konfigurasi['webSub'] }}">
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary mb-2">Simpan</button>
                    </form>
                    <hr>
                    @if($statusimport == 'false')
                        <center><a href="{{ url('importdata') }}" class="btn btn-primary">Import Data</a></center>
                    @else
                        <center><button class="btn btn-default">Sedang Import Data</button></center>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
