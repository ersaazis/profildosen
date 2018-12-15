@extends('layouts.profil')

@section('content')
    <section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-t" data-rv-view="216" style="background-image: url({{asset('assets/images/180803223141-diter-800x450.jpg')}}); padding-top: 120px; padding-bottom: 120px;">

        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-xs-center">
                    <h3 class="mbr-section-title display-2">Profil<br> Universitas Islam Negeri Sunan Gunung Djati Bandung</h3>
                    <div class="lead"><a href="{{$url}}" target="_blank">Sumber</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section">
        <div class="container">
            <div class="row">
          {!! str_replace('table1','table table-striped',$profil) !!}
            </div>
        </div>
    </section>
@endsection
