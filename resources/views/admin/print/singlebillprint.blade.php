@extends('layouts.adminMaster')

@section('content')
@section('title', 'Create Payment')
{{-- @can('Disease-Merchant') --}}

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css') }}">
@endsection

@section('content')
    {{-- @can('Merchant-List') --}}
    <section class="invoice-view-wrapper section">
        <div class="row">
            <div class="col xl3 m4 s12">
                <div class="card invoice-action-wrapper">
                    <div class="card-content" id="dd">
                        <form>
                            <input placeholder="Customer id/Name/Phone" id="search" type="text"
                                class="search-box validate white search-circle">
                        </form>
                        <div class="invoice-action-btn">
                            <a href="#"
                                class="btn indigo waves-effect waves-light display-flex align-items-center justify-content-center">
                                <i class="material-icons mr-4">check</i>
                                <span class="text-nowrap">Search </span>
                            </a>
                        </div>
                        <div class="invoice-action-btn">
                            <a href="#" class="btn-block btn btn-light-indigo waves-effect waves-light invoice-print">
                                <span>Print</span>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
            <!-- invoice view page -->
            <div class="col xl9 m8 s12">
                <div class="card">
                    <div class="card-content invoice-print-area">

                        <section class="invoice-view-wrapper section sectionone">
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
                    
                                                    <div class="row">
                                                        <div class="col m12 s12">
                                                            <h5 class="indigo-text center mt-3 mb-3">Invoice/Bill</h5>
                    
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col m12 s12">
                                                            <img width="62" height="50"
                                                                src="data:image/png;base64,{{ DNS2D::getBarcodePNG(Request::url(), 'QRCODE') }}" />
                                                        </div>
                                                    </div>
                    
                                                    <!-- invoice address and contact -->
                                                    <div class="row invoice-info">
                                                        <div class="col m12 s12">
                                                            <div class="row">
                                                                <div class="col m12 s12">
                                                                    <p>Issue Date:
                                                                        {{ date('M-d-Y', strtotime(@Carbon\Carbon::now())) }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col m12 s12">
                                                                    <p >
                                                                        ID: <strong id="userid"> </strong>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <h6 class="customer-name" style="color: #6b6f82; font-weight: 700;" id="name">
                                                               </h6>
                    
                    
                                                            <p class="mb-1" id="adress">
                                                              
                                                            </p>
                                                            <p class="mb-1">Contact Person:
                                                              <span id="contactpersion"></span></p>
                                                            <p class="mb-1">Email: <span id="email"></span> </p>
                    
                    
                    
                                                        </div>
                    
                                                    </div>
                    
                                                    <div class="pad-table mt-8 mb-8">
                                                        <div class="row">
                    
                                                            <table class="bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th data-field="id">Description</th>
                                                                        <th data-field="name">Bill of Month</th>
                                                                        <th data-field="price">Item Price</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <p>
                                                                                <strong id="description"></strong>
                                                                             
                    
                                                                            </p>
                                                                           
                                                                        </td>
                                                                        <td> {{ date('M-Y', strtotime(@Carbon\Carbon::now())) }}
                                                                        </td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <div class="col m12 s12">
                                                                                    <ul>
                                                                                        <li
                                                                                            class="display-flex justify-content-between">
                                                                                            <span
                                                                                                class="invoice-subtotal-title">Monthly
                                                                                                Rent</span>
                                                                                            <span id="monthlyrent"></span>
                                                                                        </li>
                                                                                        <li
                                                                                            class="display-flex justify-content-between">
                                                                                            <span
                                                                                                class="invoice-subtotal-title">Additional</span>
                                                                                            <span id="addicrg"></span>
                                                                                        </li>
                                                                                        <li
                                                                                            class="display-flex justify-content-between">
                                                                                            <span
                                                                                                class="invoice-subtotal-title">Discount</span>
                                                                                            <span id="discount"></span>
                                                                                        </li>
                    
                                                                                        <li
                                                                                            class="display-flex justify-content-between">
                                                                                            <span
                                                                                                class="invoice-subtotal-title">Advance</span>
                                                                                            <span id="advance"></span>
                                                                                        </li>
                                                                                        <li style="border: 1px solid"></li>
                                                                                        <li
                                                                                            class="display-flex justify-content-between">
                                                                                            <span
                                                                                                class="invoice-subtotal-title">SUM</span>
                                                                                            {{-- <span>{{ @$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg - (@$customer->bill[0]->advance + @$customer->bill[0]->discount) }}</span> --}}
                                                                                        </li>
                                                                                        <li
                                                                                            class="display-flex justify-content-between">
                                                                                            <span
                                                                                                class="invoice-subtotal-title">Vat(%)</span>
                                                                                            <span id="vat"></span>
                                                                                        </li>
                                                                                        <li style="border: 1px solid"></li>
                                                                                        <li
                                                                                            class="display-flex justify-content-between">
                                                                                            <span class="invoice-subtotal-title">Sum
                                                                                                with vat</span>
                                                                                            {{-- <span>{{ ((@$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg) * @$customer->bill[0]->vat) / 100 + (@$customer->bill[0]->monthlyrent + @$customer->bill[0]->addicrg - @$customer->bill[0]->discount) }}</span> --}}
                                                                                        </li>
                                                                                        <li
                                                                                            class="display-flex justify-content-between">
                                                                                            <span
                                                                                                class="invoice-subtotal-title">Previous
                                                                                                DUE</span>
                                                                                            <span id="due"></span>
                                                                                        </li>
                                                                                        <li style="border: 1px solid"></li>
                                                                                        <li
                                                                                            class="display-flex justify-content-between">
                                                                                            <span
                                                                                                class="invoice-subtotal-title">Total</span>
                                                                                            <span id="Total"></span>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            In Words :  <span id="Total"></span> Taka Only
                                                                        </td>
                    
                                                                    </tr>
                    
                                                                </tbody>
                                                            </table>
                    
                                                        </div>
                    
                    
                    
                                                    </div>
                    
                    
                                                    <div class="row">
                                                        <div class="col m6 s12">
                                                            <h6 style="font-weight: 700;">TERMS & CONDITIONS</h6>
                                                            <ul>
                                                                <li>* {{ @CommonFx::printsetting()->customtext }}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col m6 s12">
                                                            <p class="right">
                                                                <img src="{{ @url('storage/app/files/shares/singnaturephoto/thumbs/' . CommonFx::printsetting()->singnature) }}"
                                                                    alt=""> <br>
                                                                Authorized Signature
                                                            </p>
                                                        </div>
                                                    </div>
                    
                    
                                                </div>
                                            </div>
                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- invoice action  -->
                    
                         
                        </section>

                    
                    

                    </div>
                </div>
                <!-- invoice action  -->

            </div>
    </section>
   


    <!-- Modal Structure -->

    {{-- @endcan --}}
@endsection

@section('page-script')
    <script src="{{ asset('app-assets/js/scripts/app-invoice.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#search").focus();
            function delay(callback, ms) {
                var timer = 0;
                return function() {
                    var context = this,
                        args = arguments;
                    clearTimeout(timer);
                    timer = setTimeout(function() {
                        callback.apply(context, args);
                    }, ms || 0);
                };
            };
            $('#search').keydown(delay(function(e) {
                //console.log($('#search').val());
                $search = $('#search').val();
                $.ajax({
                    type: "post",
                    url: url + '/admin/searchsinglecustomer',
                    data: {
                        id: $search

                    },

                    success: function(data) {
                        //console.log(data.result.collection[0]);
                        $('#userid').html(null);
                        $('#name').html(null);
                        $('#ppusername').html(null);
                        $('#adress').html(null);
                        $('#monthlyrent').html(null);
                        $('#due').html(null);
                        $('#intotal').html(null);
                        $('#totall').html(null);
                        $('#collection').val(null);
                        $('#paybleamount').html(null);
                        $('#contactpersion').html(null);
                        $('#description').html(null);
                        $('#email').html(null);
                        $('#collectionid').removeAttr('value');
                        $('#description').append(data.result.description);
                        $('#contactpersion').append(data.result.contactpersion);
                        $('#email').append(data.result.email);
                        $('#userid').append('<span>' + data.result.loginid + '</span>');
                        $('#name').append('<span>' + data.result.customername + '</span>');
                        $('#ppusername').append('<span>' + data.result.secretname +
                            '</span>');
                        $('#adress').append('<span> House No # '+ data.result.houseno + ', '+ data.result.floor + ', '  + data.result.district.district + ', ' +
                            data.result.thana.thana + ', ' + data.result.area.areaname +
                            ', ' + data.result.customermobile + '</span>');
                        $('#monthlyrent').append('<span>' + data.result.bill[0]
                            .monthlyrent + '</span>');
                        $('#due').append('<span>' + data.result.bill[0].due + '</span>');
                        $('#intotal').append('<input type="hidden" value="' +(data
                            .result.bill[0].total-data
                            .result.bill[0].paid) +
                            '" id="totall"/><input type="hidden" value="' + data.result
                            .bill[0].id + '" id="collectionid" />' + '<span>' + (data
                            .result.bill[0].total-data
                            .result.bill[0].paid) + '</span>');
                            $('#collection').val( data
                            .result.bill[0].total- data
                            .result.bill[0].paid);
                            $('#collection').focus();
                            $("#paybleamount").html('<strong>' + (data
                            .result.bill[0].total-data
                            .result.bill[0].paid) + '</strong>');

                    }
                });
            }, 900));
            $("#collection").keyup(function() {
                //console.log($('#collectionid').val());


                var ttotal = $("#totall").val() - $("#collection").val();
              //  console.log($("#collection").val());
                $("#paybleamount").html('<strong>' + ttotal.toFixed(2) + '</strong>');

            });

            $("#collectionsubmit").on('click', function() {
                // console.log($("#payby").val());
                if ($("#collection").val() == '') {

                    alert('Collected Amount (Paid) Is Required');
                    $("#collection").focus();
                    return false;

                }
                if ($("#payby").val() == '') {
                    // console.log($("#collection").val());
                    alert('Select Minimum One Collection  Type');
                    $("#payby").focus();
                    return false;

                }
                $.ajax({
                    //url:url+'/admin/updatecollection/'+$("#collectionid").val(),
                    url: url + '/admin/createcollection',
                    method: "POST",
                    type: "POST",
                    data: {
                        billid: $("#collectionid").val(),
                        paid: $("#collection").val(),
                        invoice: $("#invoicesl").val(),
                        payby: $("#payby").val(),
                        note: $("#note").val(),
                        totall: $("#totall").val(),
                        
                       

                    },
                    success: function(d) {

                        if (d) {
                            $("#search").focus();
                            swal({
                                title: "Collection Done",
                                text: "collection submit successfully",
                                timer: 2000,
                                buttons: false
                            });
                            location.reload();
                            $('#userid').html(null);
                            $('#name').html(null);
                            $('#ppusername').html(null);
                            $('#adress').html(null);
                            $('#monthlyrent').html(null);
                            $('#due').html(null);
                            $('#intotal').html(null);
                            $('#totall').html(null);
                            $('#collection').val(null);
                            $('#paybleamount').html(null);
                            $('#collectionid').removeAttr('value');
                        } else {
                            $.each(d.errors, function(key, value) {
                                $("#collection").focus();
                                toastr.warning(value);
                            });
                        }

                    },
                    error: function(d) {

                        toastr.warning('Bii Allready Paid');
                    }
                });

            });
            //Update shift end



        });
    </script>


@endsection
