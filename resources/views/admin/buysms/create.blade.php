@extends('layouts.adminMaster')

@section('content')
@section('title', "Create Customer")
{{-- @can('Package-Create') --}}
@include('partial.formerror')
                            <!-- Form Advance -->
                            <div class="col s12 m12 l12">
                               
                                <div id="Form-advance" class="card card card-default scrollspy">
                                    <div class="card-content">
                                                                       
                                        {!! Form::open(array('url' => 'admin/createbuysms','method'=>'POST','files'=>true )) !!}
                                    
                                            @include('admin.buysms.form')
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                     {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
{{-- @endcan --}}
@endsection
@section('page-script')
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

$('#payment_id').change(function(){
   
            $('#showtransectionmessage').empty();

    var payid = $(this).val();

    $.ajax({
        type: "GET",
        url: url + '/getpaymentmessage/'+payid,
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){
                   
                      
                        $('#showtransectionmessage').append('<strong> Info: '+ data.note + '</strong>');

                }

            },
    });

});
});

  </script>
  @endsection
