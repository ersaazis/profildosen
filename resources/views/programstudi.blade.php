@extends('layouts.profil')

@section('content')
    <section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-t" data-rv-view="216" style="background-image: url({{asset('assets/images/180803223141-diter-800x450.jpg')}}); padding-top: 120px; padding-bottom: 120px;">

        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-xs-center">
                    <h3 class="mbr-section-title display-2">PROGRAM STUDI</h3>                    
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section">
        <div class="container">
            <div class="row">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Sumber</th>
                    </tr>
                  </thead>
                  <tbody>
                  <noscript>{{ $i=1 }}</noscript>
                  @foreach($ps as $p)
                    <tr>
                      <th scope="row">{{ $i++ }}</th>
                      <td><a href="{{ url('programstudi/'.$p->id.'/'.$p->nama) }}">{{$p->nama}}</a></td>
                      <td><a target="_blank" href="{{$p->url}}">Sumber</a></td>
                    </tr>
                  @endforeach;
                  </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
