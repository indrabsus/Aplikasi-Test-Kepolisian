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
                                <td>@if($data->jenkel == 'l')
                                    <i class="fa fa-mars" aria-hidden="true"></i>
                                    @else 
                                    <i class="fa fa-venus" aria-hidden="true"></i>
                                @endif</td>
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
                            <tr>
                              <td>Nilai Akhir Test A</td>
                              <td>:</td>
                              <td>@php
                                $na1 = round((($putaran+$gerakan+$jarak)/300)*100)
                              @endphp
                              <strong>({{$na1}})
                              @if ($na1 <= 70)
                                Kurang
                              @elseif ($na1 > 70 && $na1 <= 75)
                                Cukup
                              @elseif ($na1 > 75 && $na1 <= 85)
                                Baik
                                @elseif ($na1 > 85)
                                Sangat Baik
                              @endif
                            </strong>
                                </td>
                            </tr>
                            <tr>
                              <td>Nilai Akhir Test B</td>
                              <td>:</td>
                              <td>@php
                                $na2 = round((($b1hgb+$b1ngb+$b2hgb+$b2ngb+$b3hgb+$b3ngb+$b4hgb+$b4ngb)/800)*100)
                              @endphp
                              <strong>
                                ({{$na2}})
                              @if ($na2 <= 70)
                                Kurang
                              @elseif ($na2 > 70 && $na2 <= 75)
                                Cukup
                              @elseif ($na2 > 75 && $na2 <= 85)
                                Baik
                                @elseif ($na2 > 85)
                                Sangat Baik
                              @endif
                              </strong>
                                </td>
                            </tr>
                            <tr>
                              <td>Nilai Akhir Total</td>
                              <td>:</td>
                              <td>@php
                                $total = round((($na1+$na2)/200)*100)
                              @endphp
                              <strong>
                                ({{$total}})
                              @if ($total <= 70)
                                Kurang
                              @elseif ($total > 70 && $total <= 75)
                                Cukup
                              @elseif ($total > 75 && $total <= 85)
                                Baik
                                @elseif ($total > 85)
                                Sangat Baik
                              @endif
                              </strong>
                                </td>
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
      type: 'line',
      data: {
        labels: [
          @foreach ($hasil as $d)
             "{{ date('Y', strtotime($d->created_at)) }}",
            @endforeach
        ],
        datasets: [{
          label: 'Putaran',
          data: [
            @foreach ($hasil as $d)
             {{ $d->putaran }},
            @endforeach
          ],
          borderWidth: 1
        },
        {
          label: 'Jarak',
          data: [
            @foreach ($hasil as $d)
             {{ $d->jarak }},
            @endforeach
          ],
          borderWidth: 1
        },
        {
          label: 'Gerakan',
          data: [
            @foreach ($hasil as $d)
             {{ $d->gerakan }},
            @endforeach
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
      type: 'line',
      data: {
        labels: [
          @foreach ($item as $d)
             "{{ date('Y', strtotime($d->created_at)) }}",
            @endforeach
        ],
        datasets: [{
          label: 'HGB',
          data: [
            @foreach ($item as $d)
             {{ $d->hgb }},
            @endforeach
          ],
          borderWidth: 1
        },
        {
          label: 'NGB',
          data: [
            @foreach ($item as $d)
             {{ $d->ngb }},
            @endforeach
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
