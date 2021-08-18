<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ config('app.name','Agric Store') }}</title>
    <link rel="stylesheet" href="{{ asset('invoice/style.css') }}" media="all" />
    <style>
      .print {
            display:none;
        }
        .no-print{
            display:block;
        }
        @media print{
            .print {
                display:block;
            }
            .no-print{
                display:none;
            }
        }
    </style>  
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{ asset('assets/images/logo-2.png') }}">
      </div>
      <div id="company">
        <h2 class="name">Agric Store</h2>
        <div>Las Palmas Lapaz</div>
        <div>+233 123456789</div>
        <div><a href="#">info@agricstore.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">@yield('user_name')</h2>
          <div class="address">@yield('user_phone')</div>
          <div class="email"><a href="#">@yield('user_email')</a></div>
        </div>
        <div id="invoice">
          <h1><span>Invoice No:: </span>
            @yield("invoice_number")
           </h1>
          <div class="date">
            <span>Date of Invoice :</span>
            @section('invoice_date')
              {{ now()->toDayDateTimeString() }}
            @show
          </div>
          <div class="date"><span>Due Date :</span>
            @section('invoice_duration')
              {{ now()->addyear()->toDayDateTimeString() }}
            @show
            </div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc"><b>ITEM NAME</b></th>
            <th class="unit"><b>CATEGORY</b></th>
            <th class="desc"><b>UNIT PRICE</b></th>
            <th class="unit"><b>QUANTITY</b></th>
            <th class="total"><b>SUB TOTAL</b></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc">@yield('item_name')</td>
            <td class="unit">@yield('category_name')</td>
            <td class="desc"><span>&cent</span>@yield('item_price')</td>
            <td class="unit">@yield('item_quantity')</td>
            <td class="total">@yield('item_total_price')</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">TOTAL</td>
            <td>@yield('item_total_price_2')</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">DISCOUNT </td>
            <td>&cent @yield('item_discount')</td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td><span>&cent</span>@yield('total_price')</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks" class="no-print">Thank you!</div>

      <div id="notices">
        <div>MODE OF PAYMENT</div>
        <div class="notice">Payment is through mobile money</div>
        <p><strong>Momo Number (MTN) : +2331234567</strong></p>
      </div>
    </main>
     @yield('print_button')
       
    <footer>
      Agric Store.
    </footer>
  </body>

  <script>
    var jsPrintAll = function () {
      setTimeout(function () {
      window.print();
    }, 500);
  }
    </script>
</html>