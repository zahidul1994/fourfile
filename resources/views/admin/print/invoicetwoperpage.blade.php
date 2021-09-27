@extends('layouts.adminMaster')
{{-- page styles --}}
@section('title', ' Monthly Print')
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css') }}">
    <style>

@media print  {
  html, body,section {
    width: 210mm;
    height: 146.5mm !important;
   
  }
#footer{
    page-break-after: always;
}
  /* ... the rest of the rules ... */
}

    </style>
@endsection

{{-- page content --}}
@section('content')

{{ $customers->links() }}
<a href="#" class="btn-block btn btn-light-indigo waves-effect waves-light invoice-print">
    <span>Print</span>
</a>
@foreach ($customers as $customer)
        <section class="invoice-view-wrapper section">

            <div class="row">
                <!-- invoice view page -->
                <div class="col xl12 m12 s12">
                    <div class="card">
                        <div class="card-content invoice-print-area">


                            <div class="row" style="display: flex">
                                <div style="width: 30%;">

                                    <div class="row">
                                        <div class="col s12">


                                            <!-- header section -->

                                            <div class="row">
                                                <div class="col m12 s12">
                                                    <img width="62" height="50"
                                                        src="data:image/png;base64,{{ DNS2D::getBarcodePNG(Request::url(), 'QRCODE') }}" />
                                                </div>
                                                <div class="col m12 s12">
                                                    <h6 class="indigo-text">Office Doccument</h6>
                                                </div>
                                            </div>

                                            <!-- invoice address and contact -->
                                            <div class="row invoice-info">
                                                <div class="col m6 s12">
                                                    <div class="row">
                                                        <div class="col m12 s12">
                                                            <p>{{ date('M-d-Y', strtotime(@Carbon\Carbon::now())) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col m12 s12">
                                                            <p>
                                                                ID: {{ @$customer->loginid }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h6 class="customer-name"
                                                        style="color: #6b6f82; font-weight: 700;">
                                                        {{ @$customer->customername }}</h6>

                                                    <p class="mb-1">Address & phone no.
                                                        {{ @$customer->customerphone }},
                                                        {{ @$customer->houseno }},
                                                        {{ @$customer->area->areaname }}</p>

                                                    <p class="mb-1">
                                                        Billing Month :
                                                        {{ date('M-Y', strtotime(@Carbon\Carbon::now())) }}
                                                    </p>
                                                    <p class="mb-1">

                                                        Due Month's List : @foreach (@$customer->bill as $due)
                                                            @if (@$due->total > 0)
                                                                {{ date('M-y', strtotime(@$due->created_at)) }} :
                                                                {{ $due->total }}TK,
                                                            @endif
                                                        @endforeach
                                                    </p>

                                                </div>
                                                <div class="col m6 s12">
                                                    <ul>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Monthly Rent</span>
                                                            <span>{{ @$customer->bill[0]->monthlyrent }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Additional</span>
                                                            <span>{{ @$customer->bill[0]->addicrg }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Discount</span>
                                                            <span>{{ @$customer->bill[0]->discount }}</span>
                                                        </li>

                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Advance</span>
                                                            <span>{{ @$customer->bill[0]->advance }}</span>
                                                        </li>
                                                        <li style="border: 1px solid"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">SUM</span>
                                                            <span>{{ @$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg - (@$customer->bill[0]->advance + @$customer->bill[0]->discount) }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Vat(%)</span>
                                                            <span>{{ @$customer->bill[0]->vat }}</span>
                                                        </li>
                                                        <li style="border: 1px solid"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Sum with vat</span>
                                                            <span>{{ ((@$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg) * @$customer->bill[0]->vat) / 100 + (@$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg - @$customer->bill[0]->discount) }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Previous DUE</span>
                                                            <span>{{ @$customer->bill[0]->total }}</span>
                                                        </li>
                                                        <li style="border: 1px solid"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Total</span>
                                                            <span>{{ @$customer->bill[0]->total }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product details table-->

                                        </div>
                                    </div>
                                </div>
                                <div style="width: 30%;">

                                    <div class="row">
                                        <div class="col s12">


                                            <!-- header section -->

                                            <div class="row">
                                                <div class="col m12 s12">
                                                    <img width="62" height="50"
                                                        src="data:image/png;base64,{{ DNS2D::getBarcodePNG(Request::url(), 'QRCODE') }}" />
                                                </div>
                                                <div class="col m12 s12">
                                                    <h6 class="indigo-text">Money Receipt</h6>
                                                </div>
                                            </div>

                                            <!-- invoice address and contact -->
                                            <div class="row invoice-info">
                                                <div class="col m6 s12">
                                                    <div class="row">
                                                        <div class="col m12 s12">
                                                            <p>{{ date('M-d-Y', strtotime(@Carbon\Carbon::now())) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col m12 s12">
                                                            <p>
                                                                ID: {{ @$customer->loginid }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h6 class="customer-name"
                                                        style="color: #6b6f82; font-weight: 700;">
                                                        {{ @$customer->customername }}</h6>

                                                    <p class="mb-1">Address & phone no.
                                                        {{ @$customer->customerphone }},
                                                        {{ @$customer->houseno }},
                                                        {{ @$customer->area->areaname }}</p>

                                                    <p class="mb-1">
                                                        Billing Month :
                                                        {{ date('M-Y', strtotime(@Carbon\Carbon::now())) }}
                                                    </p>
                                                    <p class="mb-1">
                                                        Due Month's List : @foreach (@$customer->bill as $due)
                                                            @if (@$due->total > 0)
                                                                {{ date('M-y', strtotime(@$due->created_at)) }} :
                                                                {{ $due->total }}TK,
                                                            @endif
                                                        @endforeach
                                                    </p>

                                                </div>
                                                <div class="col m6 s12">
                                                    <ul>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Monthly Rent</span>
                                                            <span>{{ @$customer->bill[0]->monthlyrent }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Additional</span>
                                                            <span>{{ @$customer->bill[0]->addicrg }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Discount</span>
                                                            <span>{{ @$customer->bill[0]->discount }}</span>
                                                        </li>

                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Advance</span>
                                                            <span>{{ @$customer->bill[0]->advance }}</span>
                                                        </li>
                                                        <li style="border: 1px solid"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">SUM</span>
                                                            <span>{{ @$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg - (@$customer->bill[0]->advance + @$customer->bill[0]->discount) }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Vat(%)</span>
                                                            <span>{{ @$customer->bill[0]->vat }}</span>
                                                        </li>
                                                        <li style="border: 1px solid"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Sum with vat</span>
                                                            <span>{{ ((@$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg) * @$customer->bill[0]->vat) / 100 + (@$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg - @$customer->bill[0]->discount) }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Previous DUE</span>
                                                            <span>{{ @$customer->bill[0]->total }}</span>
                                                        </li>
                                                        <li style="border: 1px solid"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Total</span>
                                                            <span>{{ @$customer->bill[0]->total }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product details table-->

                                        </div>
                                    </div>
                                </div>
                                <div style="width: 33.33%;">
                                    <div class="row">
                                        <div class="col s12">


                                            <!-- header section -->

                                            <div class="row">
                                                <div class="col m12 s12">
                                                    <img width="62" height="50"
                                                        src="data:image/png;base64,{{ DNS2D::getBarcodePNG(Request::url(), 'QRCODE') }}" />
                                                </div>
                                                <div class="col m12 s12">
                                                    <h6 class="indigo-text">Invoice</h6>
                                                </div>
                                            </div>

                                            <!-- invoice address and contact -->
                                            <div class="row invoice-info">
                                                <div class="col m6 s12">
                                                    <div class="row">
                                                        <div class="col m12 s12">
                                                            <p>{{ date('M-d-Y', strtotime(@Carbon\Carbon::now())) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col m12 s12">
                                                            <p>
                                                                ID: {{ @$customer->loginid }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h6 class="customer-name"
                                                        style="color: #6b6f82; font-weight: 700;">
                                                        {{ @$customer->customername }}</h6>

                                                    <p class="mb-1">Address & phone no.
                                                        {{ @$customer->customerphone }},
                                                        {{ @$customer->houseno }},
                                                        {{ @$customer->area->areaname }}</p>

                                                    <p class="mb-1">
                                                        Billing Month :
                                                        {{ date('M-Y', strtotime(@Carbon\Carbon::now())) }}
                                                    </p>
                                                    <p class="mb-1">
                                                        Due Month's List : @foreach (@$customer->bill as $due)
                                                            @if (@$due->total > 0)
                                                                {{ date('M-y', strtotime(@$due->created_at)) }} :
                                                                {{ $due->total }}TK,
                                                            @endif
                                                        @endforeach
                                                    </p>

                                                </div>
                                                <div class="col m6 s12">
                                                    <ul>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Monthly Rent</span>
                                                            <span>{{ @$customer->bill[0]->monthlyrent }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Additional</span>
                                                            <span>{{ @$customer->bill[0]->addicrg }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Discount</span>
                                                            <span>{{ @$customer->bill[0]->discount }}</span>
                                                        </li>

                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Advance</span>
                                                            <span>{{ @$customer->bill[0]->advance }}</span>
                                                        </li>
                                                        <li style="border: 1px solid"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">SUM</span>
                                                            <span>{{ @$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg - (@$customer->bill[0]->advance + @$customer->bill[0]->discount) }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Vat(%)</span>
                                                            <span>{{ @$customer->bill[0]->vat }}</span>
                                                        </li>
                                                        <li style="border: 1px solid"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Sum with vat</span>
                                                            <span>{{ ((@$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg) * @$customer->bill[0]->vat) / 100 + (@$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg - @$customer->bill[0]->discount) }}</span>
                                                        </li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Previous DUE</span>
                                                            <span>{{ @$customer->bill[0]->total }}</span>
                                                        </li>
                                                        <li style="border: 1px solid"></li>
                                                        <li class="display-flex justify-content-between">
                                                            <span class="invoice-subtotal-title">Total</span>
                                                            <span>{{ @$customer->bill[0]->total }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- product details table-->
                                            <p>
                                                {{ CommonFx::printsetting()->customtext }}
                                            <p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="divider mb-3 mt-3"></div>


                        </div>
                    </div>
                </div>
            </div>
           
            @if($loop->iteration  % 2 == 0)
            <div id="footer"></div>
        @endif

        </section>
        @endforeach

@endsection
{{-- page scripts --}}
@section('page-script')
<script src="{{ asset('app-assets/js/scripts/app-invoice.js') }}"></script>
<script>
    //   window.print();
</script>
@endsection
