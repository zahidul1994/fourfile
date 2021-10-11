@extends('layouts.adminMaster')

@section('content')
@section('title', 'Create Prospectivecustomer')
{{-- @can('Disease-Merchant') --}}


@section('content')
    {{-- @can('Merchant-List') --}}
  
    @include('partial.formerror')
    <!-- Form Advance -->
    <div class="col s12 m12 l12">
       
        <div id="Form-advance" class="card card card-default scrollspy">
            <div class="card-content">
                                               
                {!! Form::open(array('url' => 'admin/createprospectivecustomer','method'=>'POST','files'=>true )) !!}
            
                    @include('admin.prospectivecustomer.form')
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

    <!-- Modal Structure -->

    {{-- @endcan --}}
@endsection
@section('page-script')


<script> 
 
  
 $(document).ready(function() {

    $('input#input_text, textarea#metadescription').characterCounter();

  $(".card .Close").click(function () {
	
    $(this).closest(".card")
        .fadeOut("slow");
});


$(".card-alert .close").click(function () {

    $(this).closest(".card-alert")
        .fadeOut("slow");
});


$('#thana_id').change(function(){
            $('#area_id').empty();

    var thanaid = $(this).val();

    $.ajax({
        type: "GET",
        url: url + '/getarea/'+thanaid,
        data:{},
        dataType: "JSON",
        success:function(data) {
           if(data){
                 
                    $.each(data, function(key, value){
                       // alert(key);
                        $('#area_id').append('<option value="'+value.id+'">' + value.areaname + '</option>');

                    });
                    $('#area_id').append(' <option  value="" selected disabled>Select Area *</option>');
                }

            },
    });
    });




});

  </script>
  @endsection