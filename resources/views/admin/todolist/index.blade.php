@extends('layouts.adminMaster')
@section('title', 'Todo List')
{{-- vendor styles --}}
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/flag-icon/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/data-tables/css/select.dataTables.min.css') }}">
@endsection
{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-tables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css') }}">
@endsection
@section('content')

    {{-- @can('Customer-Create') --}}

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <div class="input-field col s12 m9">

                    </div>


                    <div class="col s12 m3 l3 input-field">
                        <button data-target="TodoList" class="btn modal-trigger"> New List </button>
                    </div>

                    <div class="row">
                        <div class="col s12" style="overflow-x: scroll; scrollbar-width: thin;">
                            <table id="dataTable" class="display table table-striped table-bordered nowrap"
                                style="width: 100%;">
                                <thead>

                                    <tr>
                                        <td>SL</td>
                                        <td>Date</td>
                                        <td>Title</td>
                                        <td>User</td>
                                        <td>Status</td>
                                       <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div id="TodoList" class="modal">
       

        <div class="modal-content">
           
            <div class="row">
                <div class="input-field col m12 s12">
                    {!!Form::text('title',null, array('id'=>'title','class'=>'', 'required'))!!}
                  {!! Form::label('title', 'Title *') !!}

                </div>
                <div class="input-field col m12 s12">
                    {!!Form::textarea('description',null, array('id'=>'description','class'=>'materialize-textarea', 'data-length'=>'160','rows' => 4, 'cols' => 54,'required'))!!}
                  {!! Form::label('description', 'Description') !!}

                </div>
                  <div class="input-field col m12 s12">
                    {!!Form::textarea('comment',null, array('id'=>'comment','class'=>'materialize-textarea', 'data-length'=>'160','rows' => 4, 'cols' => 54))!!}
                  {!! Form::label('comment', 'Comment') !!}

                </div>
           
                 <div class="input-field col m12 s12">
                    {!! Form::select('users[]', CommonFx::Connect(), null, array('id'=>'users', 'class'=>'','multiple'=>true)) !!} 

                  {!! Form::label('user', 'Select User') !!}

                </div>
                
                </div>

            </div>

        <div class="modal-footer">
            <button class="btn cyan waves-effect waves-light right" type="button" id="Sendsmssubmit">Send
                <i class="material-icons right">send</i>
            </button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>

    {!! Form::close() !!}
   

    {{-- @endcan --}}
@endsection
{{-- vendor scripts --}}
@section('vendor-script')
    <script src="{{ asset('vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendors/data-tables/js/dataTables.select.min.js') }}"></script>
@endsection


@section('page-script')
    <script src="{{ asset('app-assets/js/scripts/data-tables.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/app-invoice.js') }}"></script>
    <script>
        $(document).ready(function() {
           $('#dataTable').DataTable({
                // responsive: true,

                processing: true,
                serverSide: true,
                ajax: {
                   
                    url: "{{ url('admin/todolist') }}",

                },

                columns: [


                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                   

                    {
                        data: 'created_at',
                        name: 'created_at',

                    },

                    {
                        data: 'title',
                        name: 'title',

                    },

                    {
                        data: 'users',
                        name: 'users',

                    },


             {
                        data: 'status',
                        name: 'status',

                    },


            



                    {
                        
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }

                ]

            });
            //Delete Admin
            $(document).on('click', '.deleteBtn', function() {

                if (!confirm('Sure?')) return;
                $id = $(this).attr('rid');
                //console.log($roomid);
                $info_url = url + '/admin/deleteprospectivecustomer/' + $id;
                $.ajax({
                    url: $info_url,
                    method: "DELETE",
                    type: "DELETE",
                    data: {},
                    success: function(data) {
                        if (data) {
                            toastr.warning('Prospective Customer Delete Successfully');
                            //location.reload();
                            $('#dataTable').DataTable().ajax.reload();

                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            $(document).on('click','.Sendsms', function(){
             $("#id").val($(this).attr('rid'));
             $('#SendSmsModal').modal('open');

}); 
$(document).on('click','#Sendsmssubmit', function(){
  //  console.log($("#users").val());
if ($("#title").val() == '') {
  alert('Type Title Text');
  $("#title").focus();
  return false;

}

$.ajax({
  type: "post",
  url:url+'/admin/createtodo',
  data: {
    title:$("#title").val(),
    description:$("#description").val(),
    comment:$("#comment").val(),
    users:$("#users").val(),
    
  },
  dataType: "json",
  success: function (d) {
      toastr.success("Task Create Successfully");
      $("#users").val(null);
      $("#title").val(null);
      $("#description").html(null);
      $("#comment").val(null);
     $('#TodoList').modal('close');
     $('#dataTable').DataTable().ajax.reload();
  }
});


});
        
        });
    </script>


@endsection
