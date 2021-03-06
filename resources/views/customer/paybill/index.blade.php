@extends('layouts.customerMaster')
@section('title', 'PayBill List')
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
                   <a href="{{url('customer/createpayment')}}" class="btn ">Pay Bill</a>
                    </div>

                    <div class="row">
                        <div class="col s12" style="overflow-x: scroll; scrollbar-width: thin;">
                            <table id="dataTable" class="display table table-striped table-bordered nowrap"
                                style="width: 100%;">
                                <thead>

                                    <tr>
                                        <td>SL</td>
                                        <td>Date</td>
                                        <td>Payby</td>
                                        <td>Amount</td>
                                        <td>Payment Number</td>
                                        <td>Transection </td>
                                        <td>Status</td>
                                       
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
    <div id="Complanemodal" class="modal">
      <div class="modal-content">
        <h5> @include('partial.ajaxformerror')</h5>
        {!! Form::open(['url' => 'customer/createcomplain', 'class' => 'form', 'id' => 'ccccc']) !!}
        {!! Form::hidden('complainid', '', ['id' => 'complainid']) !!}
          <div class="row">
              <div class="input-field col m12 s12">
                
                  {!!Form::text('complaintitle',null, array('id'=>'complaintitle','class'=>'validate', 'placeholder'=>'type some complate title','required'))!!}
                  {!! Form::label('complaintitle', 'Complain Title') !!}
              </div>
              

          
                
              </div>


          </div>

      <div class="modal-footer">
          
          <input type="button" id="addBtn" value="Save" class="btn cyan waves-effect waves-light right">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="close">Close</a>
      </div>
      {!! Form::close() !!}
  </div>


   

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
    <script>
        $(document).ready(function() {
            $(".sidenav-main").addClass("nav-collapsed");
            $("#main").addClass("main-full");
            $(".sidenav-main").hover(function() {
                $(".sidenav-main").toggleClass("nav-collapsed");
            });

            $('#dataTable').DataTable({
                // responsive: true,

                processing: true,
                serverSide: true,
                ajax: {
                   
                    url: "{{ url('customer/pyamentlist') }}",

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
                        data: 'payby',
                        name: 'payby',

                    },

                    {
                        data: 'paid',
                        name: 'paid',

                    },

                    {
                        data: 'paymentnumber',
                        name: 'paymentnumber',

                    }, {
                        data: 'transection',
                        name: 'transection',

                    },
                     {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false

                    }

                ]

            });
            //Delete Admin
            $(document).on('click', '#deleteBtn', function() {

                if (!confirm('Sure?')) return;
                $id = $(this).attr('rid');
                //console.log($roomid);
                $info_url = url + '/customer/deletecomplain/' + $id;
                $.ajax({
                    url: $info_url,
                    method: "DELETE",
                    type: "DELETE",
                    data: {},
                    success: function(data) {
                        if (data) {
                            toastr.warning('Complain Delete Successfully');
                            //location.reload();
                            $('#dataTable').DataTable().ajax.reload();

                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            $("#addBtn").click(function() {
         
if ($(this).val() == 'Save') {
 
    $.ajax({
        url:"{{ url('/customer/createcomplainsetting') }}",
        method: "POST",
        data: {
          complaintitle: $("#complaintitle").val(),
          

        },
        success: function(d) {
            if (d.success) {
                $("#Complanemodal").modal('close');
                $('#dataTable').DataTable().ajax.reload();
                 clearform();

            } else {
                $.each(d.errors, function(key, value) {
                    $('#formerrors').show();
                    $('#formerrors ul').append('<li>' + value +
                    '</li>');
                });
            }
        },
        error: function(d) {
            // alert(d.message);
            console.log(d);
        }

    });
}
});
//Create end shift

//Update shift
$("#Complanemodal").on('click', '#addBtn', function() {

if ($(this).val() == 'Update') {

    $.ajax({
        url: url + '/customer/editcomplainsetting/' + $("#complainid").val(),
        method: "PUT",
        type: "PUT",
        data: {
           complaintitle: $("#complaintitle").val(),
        },
        success: function(d) {
            if (d.success) {
                $("#Complanemodal").modal("close");
                $('#dataTable').DataTable().ajax.reload();
                 clearform();



            }
        },
        error: function(d) {
            console.log(d);
        }
    });
}
});
//Update shift end





//Edit shift
$("#dataTable").on('click', '#editBtn', function() {

$paybyid = $(this).attr('rid');

$info_url = url + '/customer/editcomplainsetting/' + $paybyid ;
//console.log($info_url);
// return;
$.get($info_url, {}, function(d) {
    
    populateForm(d);
    location.hash = "ccccc";
    $("#Complanemodal").modal("open");
});
});
//Edit shift end







//form populatede

function populateForm(data) {
$("#complaintitle").val(data.complaintitle);

$("#note").val(data.note);

$("#complainid").val(data.id);
$("#addBtn").val('Update');


}

function clearform() {
$('#ccccc')[0].reset();
$("#addBtn").val('Save');
}

$("#close").click(function() {
clearform();
});

        
        });
    </script>


@endsection
