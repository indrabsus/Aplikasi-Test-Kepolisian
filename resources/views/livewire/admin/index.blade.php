<div>
    <h3>Dashboard</h3>
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $pria }}</h3>

              <p>Peserta Laki-laki</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $wanita }}</h3>

              <p>Peserta Perempuan</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $test1 }}</h3>

              <p>Jumlah Test A</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
             </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $test2 }}</h3>

              <p>Jumlah Test B</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            </div>
        </div>
        <!-- ./col -->
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    const ctx = document.getElementById('test1');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
            @foreach ($rata1 as $d)
             "{{  date('Y', strtotime($d->created_at))  }}",
            @endforeach
        ],
        datasets: [{
          label: 'Putaran',
          data: [
            @foreach ($rata1 as $d)
             {{ $d->putaran }},
            @endforeach
          ],
          borderWidth: 1
        },
        {
          label: 'Jarak',
          data: [
            @foreach ($rata1 as $d)
             {{ $d->jarak }},
            @endforeach
          ],
          borderWidth: 1
        },
        {
          label: 'Gerakan',
          data: [
            @foreach ($rata1 as $d)
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
            @foreach ($rata2 as $d)
             "{{ date('Y', strtotime($d->created_at)) }}",
            @endforeach
        ],
        datasets: [{
          label: 'HGB',
          data: [
            @foreach ($rata2 as $d)
             {{ $d->hgb }},
            @endforeach
          ],
          borderWidth: 1
        },
        {
          label: 'NGB',
          data: [
            @foreach ($rata2 as $d)
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
</div>
