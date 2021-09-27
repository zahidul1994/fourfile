@extends('layouts.customerMaster')

@section('content')
@section('title', 'Edit Payment')
{{-- @can('Disease-Merchant') --}}

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css') }}">
@endsection

@section('content')
    {{-- @can('Merchant-List') --}}
    <section class="invoice-view-wrapper section">
        <div class="row">
           
            {!! Form::model($info, array('url' =>['customer/updatecomplain/'.$info->id], 'method'=>'PATCH','files'=>true)) !!}
                                       
            <!-- invoice view page -->
            <div class="col xl12 m12 s12">
                <div class="card">
                    <div class="card-content invoice-print-area">
                        @include('partial.formerror')
                        
                      
                        <div class="divider mb-3 mt-3"></div>
                        <!-- product details table-->
                        <div class="invoice-product-details">
                            <table  class="table table-striped table-hover">
                                <thead>
                                 
                                </thead>
                        
                        
                                <tbody>
                                  @if(count(CommonFx::CustomerComplaintitle())>0)
                                  @foreach(CommonFx::CustomerComplaintitle() as $value)
                                       
                                  <tr>
                                   
                                 <td id="check"> <label>
                                  
                                    {{ Form::checkbox('complainheding[]', $value->complaintitle, in_array($value->complaintitle, $complaininfo) ? true : false, array('class' => 'filled-in')) }}
                                    <span></span>
                                  </label></td>
                                  <td>{{ $value->complaintitle }}</td>
                                 
                                  </tr>
                                  @endforeach
                                  @else
                                 <h3 class="text-danger">Please Create Some Title</h3>
                                 @endif
                                    <tr>
                                        <td>Conversation Message </td>
                                        <td>
                                            {{ Form::text('complainmessage', null, array('class' => '')) }}
                                       </td></tr> 
                                          <tr>
                                        <td>  </td>
                                        <td>
                                            <input type="submit" id="addBtn" value="Update" class="btn cyan waves-effect waves-light right">
                                        </tr>        
                                </tbody>
                              </table>
                        </div>
                        <!-- invoice subtotal -->
                        {!! Form::close() !!}
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
            
  $(".card .Close").click(function () {
	
    $(this).closest(".card")
        .fadeOut("slow");
});


$(".card-alert .close").click(function () {

    $(this).closest(".card-alert")
        .fadeOut("slow");
});
            // clearform();
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
                    url: url + '/admin/searchsinglecustomerforcomplain',
                    data: {
                        id: $search

                    },

                    success: function(data) {
                        //console.log(data.result.collection[0]);
                        $('#userid').html(null);
                         $('#name').html(null);
                        $('#ppusername').html(null);
                        $('#adress').html(null);
                        $('#customer_id').removeAttr('value');
                        $('#customer_id').val(data.result.id);
                        $('#userid').append('<span>' + data.result.loginid + '</span>');
                        $('#name').append('<span>' + data.result.customername + '</span>');
                        $('#ppusername').append('<span>' + data.result.secretname +
                            '</span>');
                        $('#adress').append('<span> House No # '+ data.result.houseno + ','+ data.result.floor + ','  + data.result.district.district + ',' +
                            data.result.thana.thana + ',' + data.result.area.areaname +
                            ',' + data.result.customermobile + '</span>');
                           

                    }
                });
            }, 900));
        

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
           
                $search = '{{$info->customer_id}}';
                $.ajax({
                    type: "post",
                    url: url + '/admin/searchsinglecustomerforcomplain',
                    data: {
                        id: $search

                    },

                    success: function(data) {
                        //console.log(data.result.collection[0]);
                        $('#userid').html(null);
                         $('#name').html(null);
                        $('#ppusername').html(null);
                        $('#adress').html(null);
                        $('#customer_id').removeAttr('value');
                        $('#customer_id').val(data.result.id);
                        $('#userid').append('<span>' + data.result.loginid + '</span>');
                        $('#name').append('<span>' + data.result.customername + '</span>');
                        $('#ppusername').append('<span>' + data.result.secretname +
                            '</span>');
                        $('#adress').append('<span> House No # '+ data.result.houseno + ','+ data.result.floor + ','  + data.result.district.district + ',' +
                            data.result.thana.thana + ',' + data.result.area.areaname +
                            ',' + data.result.customermobile + '</span>');
                           

                    }
                });
          



        });
    </script>


@endsection
