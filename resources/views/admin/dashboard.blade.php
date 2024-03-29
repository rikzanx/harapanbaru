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
                <h3 style="font-size:3vw !important;">{{ count($products) }}</h3>
                <p style="font-size:3vw !important;">Jumlah Produk</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-box"></i>
              </div>
              <a href="{{ route('produk.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 style="font-size:3vw !important;">{{ count($categories) }}</h3>
                <p style="font-size:3vw !important;">Kategori Product</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-list"></i>
              </div>
              <a href="{{ route('kategori.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 style="font-size:3vw !important;">{{ count($images_slider) }}</h3>
                <p style="font-size:3vw !important;">Foto Slider</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-images"></i>
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
                    <h3 style="font-size:3vw !important;">{{ count($invoicesMonth) }}</h3>
                    <p style="font-size:3vw !important;">Orderan</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fas fa-file-alt"></i>
                  </div>
                  <a href="{{ route('invoice.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3 style="font-size:3vw !important;">@rupiah($invoicesMonth->sum("profit"))</h3>
                    <p style="font-size:3vw !important;">Laba bersih total (profit)</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fas fa-money-bill"></i>
                  </div>
                  <a href="{{ route('invoice.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3 style="font-size:3vw !important;">@rupiah($itemsMonth->sum("total"))</h3>
                    <p style="font-size:3vw !important;">Omset</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                  </div>
                  <a href="{{ route('invoice.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-purple">
                  <div class="inner">
                    <h3 style="font-size:3vw !important;">{{ $itemsMonth->sum("qty") }}</h3>
                    <p style="font-size:3vw !important;">Barang Terjual</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fas fa-box-open"></i>
                  </div>
                  <a href="{{ route('item.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <h4>Keseluruhan</h4>
          </div>

          <div class="col-12">
            <div class="row">
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3 style="font-size:3vw !important;">{{ count($invoices) }}</h3>
                    <p style="font-size:3vw !important;">Orderan</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fas fa-file-alt"></i>
                  </div>
                  <a href="{{ route('invoice.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3 style="font-size:3vw !important;">@rupiah($invoices->sum("profit"))</h3>
                    <p style="font-size:3vw !important;">Laba bersih total (profit)</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fas fa-money-bill"></i>
                  </div>
                  <a href="{{ route('invoice.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3 style="font-size:3vw !important;">@rupiah($items->sum("total"))</h3>
                    <p style="font-size:3vw !important;">Omset</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                  </div>
                  <a href="{{ route('invoice.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3 style="font-size:3vw !important;">{{ $items->sum("qty") }}</h3>
                    <p style="font-size:3vw !important;">Barang Terjual</p>
                  </div>
                  <div class="icon">
                    <i class="nav-icon fas fa-box-open"></i>
                  </div>
                  <a href="{{ route('item.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
@if (session()->has('status'))
    <script>
        $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Info',
            subtitle: '',
            body: '{{ session()->get("status") }}'
        })
        console.log("status");
    </script>
@endif
    
@endsection
