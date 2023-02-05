@extends('layouts.admin.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Data Peserta</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm">
                            <tr>
                                <td>Id peserta</td>
                                <td>:</td>
                                <td>{{ $data->id_peserta }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $data->nama }}</td>
                            </tr>
                            <tr>
                                <td>No Ujian</td>
                                <td>:</td>
                                <td>{{ $data->noujian }}</td>
                            </tr>
                            <tr>
                                <td>Jenis kelamin</td>
                                <td>:</td>
                                <td>{{ $data->jenkel == 'l'?'Laki-laki':'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <td>Tempat Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{ $data->ttl }}</td>
                            </tr>
                            <tr>
                                <td>Tinggi dan Berat Badan</td>
                                <td>:</td>
                                <td>{{ $data->tb }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $data->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Tensi</td>
                                <td>:</td>
                                <td>{{ $data->tensi }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Kesamaptaan A</h3>
                <div>
                    <canvas id="test1"></canvas>
                  </div>

            </div>
            <div class="col-md-6">
                <h3>Kesamaptaan B</h3>
                <div>
                    <canvas id="test2"></canvas>
                  </div>

            </div>
        </div>
    </div>
    <script src="{{asset('adminv')}}/plugins/chart-custom/chart.js"></script>

  <script>
    const ctx = document.getElementById('test1');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
            'Rata-rata Test A'
        ],
        datasets: [{
          label: 'Putaran',
          data: [
            {{ $putaran }}
          ],
          borderWidth: 1
        },
        {
          label: 'Jarak',
          data: [
            {{ $jarak }}
          ],
          borderWidth: 1
        },
        {
          label: 'Gerakan',
          data: [
            {{ $gerakan }}
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
  <script>
    const ctx2 = document.getElementById('test2');
    new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: [
            'Rata-rata Test B'
        ],
        datasets: [{
          label: 'B1 HGB',
          data: [
            {{ $b1hgb }}
          ],
          borderWidth: 1
        },
        {
          label: 'B1 NGB',
          data: [
            {{ $b1ngb }}
          ],
          borderWidth: 1
        },{
          label: 'B2 HGB',
          data: [
            {{ $b2hgb }}
          ],
          borderWidth: 1
        },
        {
          label: 'B2 NGB',
          data: [
            {{ $b2ngb }}
          ],
          borderWidth: 1
        },{
          label: 'B3 HGB',
          data: [
            {{ $b3hgb }}
          ],
          borderWidth: 1
        },
        {
          label: 'B3 NGB',
          data: [
            {{ $b3ngb }}
          ],
          borderWidth: 1
        },{
          label: 'B4 HGB',
          data: [
            {{ $b4hgb }}
          ],
          borderWidth: 1
        },
        {
          label: 'B4 NGB',
          data: [
            {{ $b4ngb }}
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
