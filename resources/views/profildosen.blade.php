@extends('layouts.profil')

@section('content')
    <section class="mbr-section article mbr-parallax-background mbr-after-navbar" id="msg-box8-t" data-rv-view="216" style="background-image: url({{asset('assets/images/180803223141-diter-800x450.jpg')}}); padding-top: 120px; padding-bottom: 120px;">

        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-xs-center">
                    <h3 class="mbr-section-title display-2">{{$dosen->nama}}</h3>
                    <div class="lead"><a href="{{$dosen->url}}" target="_blank">Sumber</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="mbr-section">
        <div class="container">
            <div class="row">
              <div class="col-md-3"><img src="{{ $dosen->foto }}" width="100%" alt=""></div>
              <div class="col-md-9">{!! str_replace('table1','table table-striped',$dosen->profil) !!}</div>
            </div>
            <div class="row">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#riwayatPendidikan" role="tab" aria-controls="home" aria-selected="true">Riwayat Pendidikan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#riwayatMengajar" role="tab" aria-controls="profile" aria-selected="false">Riwayat Mengajar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#riwayatPenelitian" role="tab" aria-controls="contact" aria-selected="false">Riwayat Penelitian</a>
                </li>
              </ul>

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="riwayatMengajar" role="tabpanel" aria-labelledby="home-tab">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Semster</th>
                        <th scope="col">Kode Matkul</th>
                        <th scope="col">Nama Matkul</th>
                        <th scope="col">Kode Kelas</th>
                        <th scope="col">Perguruan Tinggi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <noscript>{{ $i=1 }}</noscript>
                    @foreach($riwayatMengajar as $rm)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{$rm->semester}}</td>
                        <td>{{$rm->kd_matkul}}</td>
                        <td>{{$rm->nm_matkul }}</td>
                        <td>{{$rm->kd_kelas}}</td>
                        <td>{{$rm->perguruan_tinggi}}</td>
                      </tr>
                    @endforeach;
                    </tbody>
                  </table>

                </div>
                <div class="tab-pane fade" id="riwayatPendidikan" role="tabpanel" aria-labelledby="profile-tab">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Perguruan Tinggi</th>
                        <th scope="col">Gelar</th>
                        <th scope="col">Tanggal Ijazah</th>
                        <th scope="col">Jenjang</th>
                      </tr>
                    </thead>
                    <tbody>
                    <noscript>{{ $i=1 }}</noscript>
                    @foreach($riwayatPendidikan as $rp)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{$rp->perguruan_tinggi}}</td>
                        <td>{{$rp->gelar}}</td>
                        <td>{{$rp->tgl_ijazah }}</td>
                        <td>{{$rp->jenjang}}</td>
                      </tr>
                    @endforeach;
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="riwayatPenelitian" role="tabpanel" aria-labelledby="contact-tab">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Bidang Ilmu</th>
                        <th scope="col">Lembaga</th>
                        <th scope="col">Tahun</th>
                      </tr>
                    </thead>
                    <tbody>
                    <noscript>{{ $i=1 }}</noscript>
                    @foreach($riwayatPenelitian as $rpenelitian)
                      <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{$rpenelitian->judul}}</td>
                        <td>{{$rpenelitian->bidang_ilmu}}</td>
                        <td>{{$rpenelitian->lembaga }}</td>
                        <td>{{$rpenelitian->tahun}}</td>
                      </tr>
                    @endforeach;
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

    </section>
@endsection
