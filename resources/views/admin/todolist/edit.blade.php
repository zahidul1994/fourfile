@extends('layouts.adminMaster')

@section('content')
@section('title', 'Edit Todolist')
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
                                               
                {!! Form::model($infos, array('url' =>['admin/updatetodo',$infos->id], 'method'=>'PATCH','files'=>true)) !!}
                                       
                <div class="row">
                    <div class="input-field col m12 s12">
                        {!!Form::text('title',null, array('id'=>'title','class'=>'', 'required'))!!}
                      {!! Form::label('title', 'Title *') !!}
    
                    </div>
                    <div class="input-field col m12 s12">
                        {!!Form::textarea('description',null, array('id'=>'description','class'=>'materialize-textarea', 'data-length'=>'160','rows' => 4, 'cols' => 54))!!}
                      {!! Form::label('description', 'Description') !!}
    
                    </div>
                      <div class="input-field col m12 s12">
                        {!!Form::textarea('comment',null, array('id'=>'comment','class'=>'materialize-textarea', 'data-length'=>'160','rows' => 4, 'cols' => 54))!!}
                      {!! Form::label('comment', 'Comment') !!}
    
                    </div>
               
                     <div class="input-field col m12 s12">
                        {!! Form::select('users[]', CommonFx::Connect(),$userinfo, array('id'=>'users', 'class'=>'select2 browser-default','multiple'=>true)) !!} 
    
                
    
                    </div>
                    <div class="input-field col m12 s12">
                        {!! Form::select('status', ['1'=>'Pending','2'=>'Complete'],null, array('id'=>'status', 'class'=>'select2 browser-default')) !!} 
    
                
    
                    </div>
                    
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
           



        });
    </script>


@endsection
