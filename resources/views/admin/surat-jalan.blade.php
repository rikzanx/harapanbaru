<head>
  <title>Surat Jalan {{$company->name}} {{$invoice->no_invoice}}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
      background: #ccc;
      padding: 30px;
    }
    
    .container {
      width: 21cm;
      min-height: 29.7cm;
    }
    
    .invoice {
      background: #fff;
      width: 100%;
      padding: 50px;
    }
    
    .logo {
      width: 2.5cm;
    }
    
    .document-type {
      text-align: right;
      color: #444;
    }
    
    .conditions {
      font-size: 0.7em;
      color: #666;
    }
    
    .bottom-page {
      font-size: 0.7em;
    }
    hr{
      background-color: black !important;
      color: black !important;  
      opacity: 1;
      border-top: 1px solid black !important;
    }
    </style>
</head>
<div class="container">
    <div class="invoice">
      <div class="row">
        <div class="col-8">
          <div class="row">
            <div class="col-3">
              <img src="{{ asset($company->image_company) }}" class="logo">
            </div>
            <div class="col-9">
              <p>
                <strong>{{ $company->name }}</strong><br>
                {{$company->address}}<br>
                Telp : {{ $company->telp}}
              </p>
            </div>
          </div>
          
        </div>
        <div class="col-4">
            <h2 class="text-end">Surat Jalan</h2>
        </div>
      </div>
        <hr>
      <div class="row">
        <div class="col-6">
          <p>
            <strong>Kepada</strong><br>
            {{  $invoice->name_customer}}<br>
            {{  $invoice->address_customer}}<br>
            {{  $invoice->phone_customer}}
          </p>
        </div>
        <div class="col-6">
          <p class="text-end">
            No invoice : {{  $invoice->no_invoice}}<br>
            Tanggal Kirim: {{  $tanggal_pengiriman}}<br>
          </p>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
            <p>Dikirimkan barang-barang sebagai berikut:</p>
              <table class="table table-bordered my-0">
                <thead>
                  <tr>
                      <td><strong>Nama barang</strong></td>
                      <td class="text-center"><strong>Jumlah</strong></td>
                  </tr>
                </thead>
                <tbody>
                  <!-- foreach ($order->lineItems as $line) or some such thing here -->
                  <?php $subtotal = 0; ?>
                  @foreach($invoice->items as $item)
                    <tr>
                        <td>{{ $item->description }}</td>
                        <td class="text-center">{{ $item->qty }}</td>
                    </tr>
                    <?php $subtotal += $item->item_price * $item->qty; ?>
                  @endforeach
                  <tr>
                    <td class="thick-line" colspan="2">
                      <p>
                        PERHATIAN<br>
                        1. Surat jalan merupakan bukti resmi penerimaan barang<br>
                        2. Surat jalan ini bukan bukti penjualan
                      </p>
                    </td>
                  </tr>
                </tbody>
              </table>
      </div>
      
      <div class="row my-4">
        <div class="col text-center">
          Penerima
          <br>
          <br>
          <br>
          <br>
          <br>
          <hr>
        </div>
        <div class="col-6">
        </div>
        <div class="col text-center">
          Pengirim
          <br>
          <br>
          <br>
          <br>
          <br>
          <hr>
        </div>
      </div>
      
      <br>
      <br>
      <br>
      <br>
    </div>
  </div>
