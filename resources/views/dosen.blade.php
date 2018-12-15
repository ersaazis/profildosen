@extends('layouts.profil')

@section('content')
    <section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-t" data-rv-view="216" style="background-image: url({{asset('assets/images/180803223141-diter-800x450.jpg')}}); padding-top: 120px; padding-bottom: 120px;">

        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-xs-center">
                    <h3 class="mbr-section-title display-2">DOSEN</h3>                    
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section" style="padding-top: 40px; padding-bottom: 40px;">
        <div class="container">
            <div class="row">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Gelar</th>
                      <th scope="col">Pendidikan</th>
                      <th scope="col">Sumber</th>
                    </tr>
                  </thead>
                  <tbody>
                  <noscript>{{ $i=1*(((empty($_GET['page'])?1:$_GET['page'])-1)*15)+1 }}</noscript>
                  @foreach($dosen as $d)
                    <tr>
                      <th scope="row">{{ $i++ }}</th>
                      <td><a href="{{ url('dosen/'.$d->id.'/'.$d->nama) }}">{{$d->nama}}</a></td>
                      <td>{{$d->gelar}}</td>
                      <td>{{$d->pendidikan}}</td>
                      <td><a target="_blank" href="{{$d->url}}">Sumber</a></td>
                    </tr>
                  @endforeach;
                  </tbody>
                </table>
                {{$dosen->links()}}
            </div>
        </div>
    </section>
@endsection
