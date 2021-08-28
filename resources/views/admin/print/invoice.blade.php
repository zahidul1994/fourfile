@extends('layouts.adminMaster')
{{-- page styles --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css') }}">
@endsection

{{-- page content --}}
@section('content')
@section('title', ' Monthly Print')
{{ $customers->links() }}
<a href="#" class="btn-block btn btn-light-indigo waves-effect waves-light invoice-print">
    <span>Print</span>
</a>
<section class="invoice-view-wrapper section" >
    @foreach ($customers as $customer)
        

    <div class="row">
        <!-- invoice view page -->
        <div class="col xl12 m12 s12">
            <div class="card">
                <div class="card-content invoice-print-area">

                    <!-- Page Length Options -->
                    <div class="row">
                        <div class="col s12">

                         
                                <!-- header section -->
                          
                                <!-- logo and title -->
                                <div class="row invoice-logo-title">
                                    <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
                                        <img  width="62" height="50"  src="data:image/png;base64,{{DNS2D::getBarcodePNG(Request::url(), 'QRCODE')}}" />
                                        
                                    </div>
                                    <div class="col m6 s12 pull-m6">
                                        <h5 class="indigo-text">Office Doccument</h5>

                                    </div>
                                </div>

                                <!-- invoice address and contact -->
                                <div class="row invoice-info">
                                    <div class="col m6 s12">
                                        <div class="row">
                                            <div class="col m6 s6">
                                                <p>{{date('M-d-Y', strtotime(@Carbon\Carbon::now()))}}</p>
                                            </div>
                                            <div class="col m6 s6">
                                                <p>
                                                    ID: {{@$customer->loginid}}
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="customer-name" style="color: #6b6f82; font-weight: 700;">{{@$customer->loginid}}</h6>
                                       
                                        <p class="mb-1">Contact Person: {{@$customer->customername}}. </p>
                                        <p class="mb-1">Address & phone no:  {{@$customer->customerphone}},{{@$customer->houseno}} {{@$customer->houseno}},  {{@$customer->district->district}},{{@$customer->thana->thana}},{{@$customer->area->areaname}}</p>
                                     <p class="mb-1">Internal ID: 7331151071</p>
                                       
                                       <div style="border:1px solid; padding:5px">
                                        <p class="mb-1">
                                            Billing Month : {{date('M-Y', strtotime(@Carbon\Carbon::now()))}}
                                        </p>
                                        <p class="mb-1">
                                            Due Month's List : @foreach (@$customer->bill as $due)
                                            @if(@$due->total>0)
                                                {{date('M-y', strtotime(@$due->created_at))}} : {{$due->total}}TK,
                                                    @endif
                                            @endforeach
                                        </p>

                                    </div>

                                    </div>
                                    
                                    <div class="col m6 s12">
                                        <ul>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Monthly Rent</span>
                                                <span>{{@$customer->bill[0]->monthlyrent}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Additional</span>
                                                <span>{{@$customer->bill[0]->addicrg}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Discount</span>
                                                <span>{{@$customer->bill[0]->discount}}</span>
                                            </li>
                                       
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Advance</span>
                                                <span>{{@$customer->bill[0]->advance}}</span>
                                            </li>
                                            <li style="border: 1px solid"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">SUM</span>
                                                <span>{{(@$customer->bill[0]->monthlyrent+@$customer->bill[0]->addicrg)-(@$customer->bill[0]->advance+@$customer->bill[0]->discount)}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Vat(%)</span>
                                                <span>{{@$customer->bill[0]->vat}}</span>
                                            </li>
                                            <li style="border: 1px solid"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Sum with vat</span>
                                                <span>{{(((@$customer->bill[0]->monthlyrent+@$customer->bill[0]->addicrg)*(@$customer->bill[0]->vat))/100)+(@$customer->bill[0]->monthlyrent+@$customer->bill[0]->addicrg)}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Previous DUE</span>
                                                <span>{{@$customer->bill[0]->due}}</span>
                                            </li>
                                           <li style="border: 1px solid"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Total</span>
                                                <span>{{@$customer->bill[0]->total}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- product details table-->

                            
                        </div>
                    </div>
                    <div class="divider mb-1 mt-1"></div>
                      <!-- Page Length Options -->
                      <div class="row">
                        <div class="col s12">

                         
                                <!-- header section -->
                          
                                <!-- logo and title -->
                                <div class="row invoice-logo-title">
                                    <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
                                        <img  wwidth="62" height="50"   src="data:image/png;base64,{{DNS2D::getBarcodePNG(Request::url(), 'QRCODE')}}" />
                                        
                                    </div>
                                    <div class="col m6 s12 pull-m6">
                                        <h5 class="indigo-text">Money Receipet</h5>

                                    </div>
                                </div>

                                <!-- invoice address and contact -->
                                <div class="row invoice-info">
                                    <div class="col m6 s12">
                                        <div class="row">
                                            <div class="col m6 s6">
                                                <p>{{date('M-d-Y', strtotime(@Carbon\Carbon::now()))}}</p>
                                            </div>
                                            <div class="col m6 s6">
                                                <p>
                                                    ID: {{@$customer->loginid}}
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="customer-name" style="color: #6b6f82; font-weight: 700;">{{@$customer->loginid}}</h6>
                                       
                                        <p class="mb-1">Contact Person: {{@$customer->customername}}. </p>
                                        <p class="mb-1">Address & phone no:  {{@$customer->customerphone}},{{@$customer->houseno}} {{@$customer->houseno}},  {{@$customer->district->district}},{{@$customer->thana->thana}},{{@$customer->area->areaname}}</p>
                                     <p class="mb-1">Internal ID: 7331151071</p>
                                       
                                       
                                     <div style="border:1px solid; padding:5px">
                                        <p class="mb-1">
                                            Billing Month : {{date('M-Y', strtotime(@Carbon\Carbon::now()))}}
                                        </p>
                                        <p class="mb-1">
                                            Due Month's List : @foreach (@$customer->bill as $due)
                                            @if(@$due->total>0)
                                                {{date('M-y', strtotime(@$due->created_at))}} : {{$due->total}}TK,
                                                    @endif
                                            @endforeach
                                        </p>

                                    </div>
                                    
                                    </div>
                                    <div class="col m6 s12">
                                        <ul>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Monthly Rent</span>
                                                <span>{{@$customer->bill[0]->monthlyrent}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Additional</span>
                                                <span>{{@$customer->bill[0]->addicrg}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Discount</span>
                                                <span>{{@$customer->bill[0]->discount}}</span>
                                            </li>
                                       
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Advance</span>
                                                <span>{{@$customer->bill[0]->advance}}</span>
                                            </li>
                                            <li style="border: 1px solid"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">SUM</span>
                                                <span>{{(@$customer->bill[0]->monthlyrent+@$customer->bill[0]->addicrg)-(@$customer->bill[0]->advance+@$customer->bill[0]->discount)}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Vat(%)</span>
                                                <span>{{@$customer->bill[0]->vat}}</span>
                                            </li>
                                            <li style="border: 1px solid"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Sum with vat</span>
                                                <span>{{(((@$customer->bill[0]->monthlyrent+@$customer->bill[0]->addicrg)*(@$customer->bill[0]->vat))/100)+(@$customer->bill[0]->monthlyrent+@$customer->bill[0]->addicrg)}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Previous DUE</span>
                                                <span>{{@$customer->bill[0]->due}}</span>
                                            </li>
                                           <li style="border: 1px solid"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Total</span>
                                                <span>{{@$customer->bill[0]->total}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- product details table-->

                            
                        </div>
                    </div>
                    <div class="divider mb-1 mt-1"></div>
                      <!-- Page Length Options -->
                      <div class="row">
                        <div class="col s12">

                         
                                <!-- header section -->
                          
                                <!-- logo and title -->
                                <div class="row invoice-logo-title">
                                    <div class="col m6 s12 display-flex invoice-logo mt-1 push-m6">
                                        <img width="62" height="50"   src="data:image/png;base64,{{DNS2D::getBarcodePNG(Request::url(), 'QRCODE')}}" />
                                        
                                    </div>
                                    <div class="col m6 s12 pull-m6">
                                        <h5 class="indigo-text">Invoice</h5>

                                    </div>
                                </div>

                                <!-- invoice address and contact -->
                                <div class="row invoice-info">
                                    <div class="col m6 s12">
                                        <div class="row">
                                            <div class="col m6 s6">
                                                <p>{{date('M-d-Y', strtotime(@Carbon\Carbon::now()))}}</p>
                                            </div>
                                            <div class="col m6 s6">
                                                <p>
                                                    ID: {{@$customer->loginid}}
                                                </p>
                                            </div>
                                        </div>
                                        <h6 class="customer-name" style="color: #6b6f82; font-weight: 700;">{{@$customer->loginid}}</h6>
                                       
                                        <p class="mb-1">Contact Person: {{@$customer->customername}}. </p>
                                        <p class="mb-1">Address & phone no:  {{@$customer->customerphone}},{{@$customer->houseno}} {{@$customer->houseno}},  {{@$customer->district->district}},{{@$customer->thana->thana}},{{@$customer->area->areaname}}</p>
                                     <p class="mb-1">Internal ID: 7331151071</p>
                                       
                                     <div style="border:1px solid; padding:5px">
                                        <p class="mb-1">
                                            Billing Month : {{date('M-Y', strtotime(@Carbon\Carbon::now()))}}
                                        </p>
                                        <p class="mb-1">
                                            Due Month's List : @foreach (@$customer->bill as $due)
                                            @if(@$due->total>0)
                                                {{date('M-y', strtotime(@$due->created_at))}} : {{$due->total}}TK,
                                                    @endif
                                            @endforeach
                                        </p>

                                    </div>
                                    </div>
                                    <div class="col m6 s12">
                                        <ul>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Monthly Rent</span>
                                                <span>{{@$customer->bill[0]->monthlyrent}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Additional</span>
                                                <span>{{@$customer->bill[0]->addicrg}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Discount</span>
                                                <span>{{@$customer->bill[0]->discount}}</span>
                                            </li>
                                       
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Advance</span>
                                                <span>{{@$customer->bill[0]->advance}}</span>
                                            </li>
                                            <li style="border: 1px solid"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">SUM</span>
                                                <span>{{(@$customer->bill[0]->monthlyrent+@$customer->bill[0]->addicrg)-(@$customer->bill[0]->advance+@$customer->bill[0]->discount)}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Vat(%)</span>
                                                <span>{{@$customer->bill[0]->vat}}</span>
                                            </li>
                                            <li style="border: 1px solid"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Sum with vat</span>
                                                <span>{{(((@$customer->bill[0]->monthlyrent+@$customer->bill[0]->addicrg)*(@$customer->bill[0]->vat))/100)+(@$customer->bill[0]->monthlyrent+@$customer->bill[0]->addicrg)}}</span>
                                            </li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Previous DUE</span>
                                                <span>{{@$customer->bill[0]->due}}</span>
                                            </li>
                                           <li style="border: 1px solid"></li>
                                            <li class="display-flex justify-content-between">
                                                <span class="invoice-subtotal-title">Total</span>
                                                <span>{{@$customer->bill[0]->total}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- product details table-->
                                <p>Note: {{CommonFx::printsetting()->customtext}} <p>

                                    <p class="right">
                                        <img src="{{@url('storage/app/files/shares/singnaturephoto/thumbs/'.CommonFx::printsetting()->singnature)}}" alt=""> <br>
                                        Authorized Signature
                                    </p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- invoice action  -->

    </div>
</section>

@endsection
{{-- page scripts --}}
@section('page-script')
<script src="{{ asset('app-assets/js/scripts/app-invoice.js') }}"></script>
<script>
    
//   window.print();
</script>
@endsection
