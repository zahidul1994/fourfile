@extends('layouts.customerMaster')

@section('content')
@section('title', 'Create Paybill')
{{-- @can('Disease-Merchant') --}}

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css') }}">
@endsection

@section('content')
    {{-- @can('Merchant-List') --}}
    <section class="invoice-view-wrapper section">
        <div class="row">
            {!! Form::open(array('url' => 'customer/createpayment','method'=>'POST','files'=>true )) !!}
            <!-- invoice view page -->
            <div class="col xl12 m12 s12">
                <div class="card">
                    <div class="card-content invoice-print-area">

<input type="hidden" value="{{$Bill->id}}" name="bill_id">
<input type="hidden" value="{{$Bill->total}}" name="paid">

                        <!-- invoice address and contact -->
                        
                        <div class="divider mb-3 mt-3"></div>
                        <!-- product details table-->
                        <div class="invoice-product-details">
                            <table class="striped responsive-table">
                                <thead>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Monthly Rent</td> 
                                        <td class="indigo-text right-align" id="monthlyrent"> {{$Bill->monthlyrent}}</td>
                                    </tr>
                                    <tr>
                                        <td>Previus Due</td>

                                        <td class="indigo-text right-align" id="due"> {{$Bill->due}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Payable</strong></td>

                                        <td class="indigo-text right-align" id="intotal">{{$Bill->total}}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>Pay By Info</strong></td>

                                        <td class="indigo-text right-align" id="paybleamount"></td>
                                    </tr>
                                    <tr>
                                        <td class="">
                                            {!! Form::select('payby', $payby, null, ['id' => 'payby', 'required', 'class' => 'indigo-text right-align', 'placeholder' => '* Select One','required']) !!}

                                        </td>
                                        <td> <strong id="Info">Note: </strong></td>

                                        
                                    </tr>
                                    <tr>
                                      
                                        <td><strong>Payment Number *</strong><input type="text" name="paymentnumber"  required  style="border: 1px solid #ddd"></td>
                                        <td><strong>Transection Id :</strong><input type="text" name="transection" required
                                            style="border: 1px solid #ddd"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="indigo-text right-align"><button
                                                class="btn indigo waves-effect waves-light page-footer"
                                                id="collectionsubmit">Submit</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- invoice subtotal -->

                    </div>
                </div>
                <!-- invoice action  -->

            </div>
            {!! Form::close() !!}
         </div>
    </section>


    <!-- Modal Structure -->

    {{-- @endcan --}}
@endsection



@section('page-script')
<script> 
 $(document).ready(function() {
   
    $('input#input_text, textarea#description').characterCounter();
  })

  $(".card .Close").click(function () {
	
    $(this).closest(".card")
        .fadeOut("slow");
});


$(".card-alert .close").click(function () {

    $(this).closest(".card-alert")
        .fadeOut("slow");
});

$('#payby').change(function(){
            $('#Info').empty();

    var payid = $(this).val();

    $.ajax({
        type: "GET",
        url: url + '/getadminpaybyinfo/'+payid,
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){
                   
                      
                        $('#Info').append('<strong> Info: '+ data.description + '</strong>');

                }

            },
    });

});

  </script>
  @endsection

