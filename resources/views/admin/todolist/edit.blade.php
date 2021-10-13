@extends('layouts.adminMaster')

@section('content')
@section('title', 'Edit Prospective')
{{-- @can('Disease-Merchant') --}}

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css') }}">
@endsection

@section('content')
    {{-- @can('Merchant-List') --}}
   

    @include('partial.formerror')
    <!-- Form Advance -->
    <div class="col s12 m12 l12">
       
        <div id="Form-advance" class="card card card-default scrollspy">
            <div class="card-content">
                                               
                {!! Form::model($infos, array('url' =>['admin/updateprospectivecustomer',$infos->id], 'method'=>'PATCH','files'=>true)) !!}
                                       
                    @include('admin.prospectivecustomer.form')
                    <div class="row">
                    <div class="col m2">
                    Status *
                      </div>
                    <div class="col m10">
                        {!! Form::select('status', ['0'=>'No-Customer','1'=>'Customer'], null, ['id' => 'status','class'=>'select2 browser-default validate', 'placeholder' => 'Select Thana']) !!}
                      </div>
                      </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Update
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
           


    var thanaid = '{{$infos->thana_id}}';
var areaid='{{$infos->area_id}}';
    $.ajax({
        type: "GET",
        url: url + '/getarea/'+thanaid,
        data:{},
        dataType: "JSON",
        success:function(data) {
         
            $.each(data, function(key, value){
                       // console.log(thanaid)
                        if(value.id==areaid){
                        $('#area_id').append('<option value="'+value.id+'" selected>' + value.areaname + '</option>');
                       }else{
                        $('#area_id').append('<option value="'+value.id+'">' + value.areaname + '</option>');
                       }
                       
                    });
        }
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
