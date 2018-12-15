@extends('layouts.profil')

@section('content')
    <section class="mbr-section mbr-section-hero mbr-section-full mbr-section-with-arrow mbr-after-navbar" id="header4-1" data-bg-video="https://www.youtube.com/embed/nJzKys72gso?rel=0&amp;amp;showinfo=0&amp;autoplay=0&amp;loop=0" data-rv-view="15">

        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>

        <div class="mbr-table-cell">

            <div class="container">
                <div class="row">
                    <div class="mbr-section col-md-10 col-md-offset-2 text-xs-right">

                        <h1 class="mbr-section-title display-1">PROFIL DOSEN</h1>
                        <p class="mbr-section-lead lead">Universitas Islam Negeri Sunan Gunung Djati Bandung</p>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#buttons1-n"><i class="mbr-arrow-icon"></i></a></div>

    </section>
    <section class="mbr-section article mbr-parallax-background text-white" style="padding-top: 40px; padding-bottom: 40px;">

        <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(34, 34, 34);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-xs-center">
                    <h3 class="mbr-section-title display-2">Profil Dosen</h3>
                    
                    
                </div>
            </div>
        </div>

    </section>

    <section class="mbr-cards mbr-section mbr-section-nopadding" id="features3-b" data-rv-view="179" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-cards-row row">
        @foreach($dosen as $d)
            <div class="mbr-cards-col col-xs-12 col-lg-3" style="padding-top: 80px; padding-bottom: 80px;">
                <div class="container">
                  <div class="card cart-block">
                      <div class="card-img"><img src="{{ $d->foto }}" class="card-img-top"></div>
                      <div class="card-block">
                        <h4 class="card-title">{{ $d->nama }}</h4>
                        <h5 class="card-subtitle"><a target="_blank" href="{{ $d->url }}">Sumber</a></h5>
                        
                        <div class="card-btn"><a href="{{ url('dosen/'.$d->id.'/'.$d->nama) }}" class="btn btn-primary">DETAIL</a></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach;
        </div>
    </section>
    <section class="mbr-section article mbr-parallax-background text-white" style="padding-top: 40px; padding-bottom: 40px;">

        <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(34, 34, 34);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-xs-center">
                    <h3 class="mbr-section-title display-2">Program Studi</h3>
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
