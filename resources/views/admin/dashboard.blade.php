@extends('admin.layouts.app')

@section('css')
    
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ count($products) }}</h3>
                <p>Jumlah Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('produk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ count($categories) }}</h3>
                <p>Kategori Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('kategori.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ count($images_slider) }}</h3>
                <p>Foto Slider</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('slider.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-12">
            <h4>Bulan ini</h4>
          </div>
          {{-- Total --}}
          <div class="col-12">
            <div class="row">
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3>{{ count($invoicesMonth) }}</h3>
                    <p>Orderan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-cart"></i>
                  </div>
                  <a href="{{ route('slider.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3>@rupiah($invoicesMonth->sum("profit"))</h3>
                    <p>Laba bersih total (profit)</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-cart"></i>
                  </div>
                  <a href="{{ route('slider.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3>@rupiah($itemsMonth->sum("total"))</h3>
                    <p>Omset</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-cash"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3>{{ $itemsMonth->sum("qty") }}</h3>
                    <p>Barang Terjual</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-briefcase"></i>
                  </div>
                  <a href="{{ route('slider.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <h4>Keseluruhan tahun ini</h4>
          </div>
          {{-- Total --}}
          <!-- LINE CHART -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Line Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- BAR CHART -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Bar Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="col-12">
            <div class="row">
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{ count($invoices) }}</h3>
                    <p>Orderan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-cart"></i>
                  </div>
                  <a href="{{ route('slider.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>@rupiah($invoices->sum("profit"))</h3>
                    <p>Laba bersih total (profit)</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-cart"></i>
                  </div>
                  <a href="{{ route('slider.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>@rupiah($items->sum("total"))</h3>
                    <p>Omset</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-cash"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{ $items->sum("qty") }}</h3>
                    <p>Barang Terjual</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-briefcase"></i>
                  </div>
                  <a href="{{ route('slider.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          {{-- end total --}}
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    var q = [0, 48, 40, 19, 86, 27, 90,28, 48, 40, 19, 86, 27, 90];
    var omset = @json($arrayOmset);
    var profit = @json($arrayProfit);
    // console.log(app);
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','Oktober','November','Desember'],
      datasets: [
        {
          label               : 'laba',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : profit
        },
        {
          label               : 'Omset',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : omset
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })


    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

  })
</script>
    
@endsection