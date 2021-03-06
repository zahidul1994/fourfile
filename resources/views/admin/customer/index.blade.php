@extends('layouts.adminMaster')
@section('title', 'Customer List')
{{-- vendor styles --}}
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/flag-icon/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
   
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
   
@endsection
{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-tables.css') }}">
    <link rel="stylesheet" type="text/css" href="https://datatables.net/release-datatables/extensions/FixedHeader/css/fixedHeader.dataTables.css">
   <style>
        td {
            border: 1px solid #ddd;
            white-space: normal !important;
            padding: 5px !important;
            text-align: center;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 5px !important;
        }

        th {
            border: 1px solid #ddd;
            padding: 5px !important;
            text-align: left;
        }

        .card-content {
            padding: 10px !important;
        }

        table.dataTable thead .sorting {
            background-image: blod;
        }

        table.dataTable thead .sorting_asc {
            background-image: blod;
        }

        .sorting-icon {
            display: flex;
            align-items: center;

        }

        .sorting-icon i {
            font-size: 15px !important;
            margin-left: auto
        }

        table.dataTable tbody td:nth-child(3) {
            text-align: left
        }

        table.dataTable tbody td:nth-child(4) {
            text-align: left
        }



        table.dataTable thead .sorting,
        table.dataTable thead .sorting_asc,
        table.dataTable thead .sorting_desc,
        table.dataTable thead .sorting_asc_disabled,
        table.dataTable thead .sorting_desc_disabled {
            background-position: 90% 50%;
        }

        .sorting_asc {
            width: 40px;
        }

        input:not([type]),
        input[type="text"]:not(.browser-default),
        input[type="password"]:not(.browser-default),
        input[type="email"]:not(.browser-default),
        input[type="url"]:not(.browser-default),
        input[type="time"]:not(.browser-default),
        input[type="date"]:not(.browser-default),
        input[type="datetime"]:not(.browser-default),
        input[type="datetime-local"]:not(.browser-default),
        input[type="tel"]:not(.browser-default),
        input[type="number"]:not(.browser-default),
        input[type="search"]:not(.browser-default),
        textarea.materialize-textarea {
            width: auto;
            height: 36px;
            margin-bottom: 30px;
            margin-left: 10px !important;
        }

    </style>
@endsection
@section('content')

    {{-- @can('Customer-Create') --}}

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                  
                    <div class="input-field col s12 m6 p-0">
                        <form  style="display: flex">
                            <p style="margin: 0 10px 10px 4px; padding: 5px 10px; border: 1px solid #A9A9A9; background: linear-gradient(to bottom, rgba(153,153,153,0.1) 0%, rgba(0,0,0,0.1) 100%)">
                              <label id="collectionval">
                                <input type="checkbox"  id="collectionval" />
                                <span style="padding-left: 25px !important; color: #222; font-size: 14px">Collection List</span>
                              </label>
                            </p>
                            <p style="margin: 0 0 10px 10px; padding: 5px 10px; border: 1px solid #A9A9A9; background: linear-gradient(to bottom, rgba(153,153,153,0.1) 0%, rgba(0,0,0,0.1) 100%)">
                                <label id="withoutcollectionval">
                                  <input type="checkbox" id="withoutcollectionval"/>
                                  <span style="padding-left: 25px !important; color: #222; font-size: 14px">Without Collection List</span>
                                </label>
                              </p><p style="margin: 0 0 10px 10px; padding: 5px 10px; border: 1px solid #A9A9A9; background: linear-gradient(to bottom, rgba(153,153,153,0.1) 0%, rgba(0,0,0,0.1) 100%)">
                                <label id="withoutcollectionval">
                                 <span style=color: #222; font-size: 14px"   >Total Record <strong id="Totalselect"></strong></span>
                                </label>
                              </p>
                           
                          </form>
                    </div>


                    <div class="col s12 m3 l3 input-field">
                  
                        <a href="{{ url('admin/createcustomer') }}" class="waves-effect waves-light  btn"><i
                                class="material-icons right">gps_fixed</i> Create  Customer</a>
                               
                    </div>
                     <div class="col s12 m3 l3 input-field">
                  
                        <button data-target="SendSms" class="btn modal-trigger"> Send Sms <i
                            class="material-icons right">sms</i></button>
                    </div>

                    <div class="row">
                        <div class="col s12" style="">
                            <table id="dataTable" class="display table table-striped table-bordered nowrap"
                            style="width: 100%; font-size: 12px; font-family: serif;">
                                <thead>

                                    <tr>
                                        <th>SL</th>
                                        <th>ID</th>
                                        <th style="text-align: left !important">Name </th>
                                        <th style="text-align: left !important">Address</th>
                                        <th>Mobile</th>
                                        <th>IP/<br>Username</th>
                                        <th>Rent </th>
                                        <th>Previus <br>Due </th>
                                        <th>Discount </th>
                                        <th>Advance </th>
                                        <th>Add </th>
                                        <th>Vat % </th>
                                        <th>Bill <br> Amount</th>
                                        <th>Collection <br>Amount</th>
                                        <th>Total <br>Due</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



                                </tbody>
                                <tfoot>
                                    <th>SL</th>
                                    <th>ID</th>
                                    <th style="text-align: left !important">Name </th>
                                    <th style="text-align: left !important">Address</th>
                                    <th>Mobile</th>
                                    <th>IP/<br>Username</th>
                                    <th>Rent </th>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    {{-- <th>Status</th> --}}
                                    <th>Action</th>
                                     
                                </tfoot>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="UpdateBill" class="modal">
        <div class="modal-content">


            <div class="row">
                <div class="input-field col m6 s12">
                    {!! Form::number('monthlyrent', null, ['id' => 'monthlyrent', 'class' => 'validate', 'placeholder' => 'placeholder']) !!}
                    {!! Form::label('active', 'Monthly Charge') !!}

                </div>
                <div class="input-field col m6 s12">
                    {!! Form::number('addicrg', null, ['id' => 'addicrg', 'class' => 'validate', 'placeholder' => 'placeholder']) !!}
                    {!! Form::label('addicrg', 'Additional Charge') !!}

                </div>

                <div class="input-field col m6 s12">
                    {!! Form::number('discount', null, ['id' => 'discount', 'class' => 'validate', 'placeholder' => 'placeholder']) !!}
                    {!! Form::label('discount', 'Discount') !!}

                </div>
                <div class="input-field col m6 s12">
                    {!! Form::number('due', null, ['id' => 'due', 'class' => 'validate', 'placeholder' => 'placeholder','disabled']) !!}
                    {!! Form::label('due', 'Due') !!}

                </div>

            </div>
            <div class="row">
                <div class="input-field col m6 s12">
                    {!! Form::number('advance', null, ['id' => 'advance', 'class' => 'validate', 'placeholder' => 'placeholder']) !!}
                    {!! Form::label('advance', 'Advance') !!}

                </div>

                <div class="input-field col m6 s12">
                    {!! Form::number('vat', null, ['id' => 'vat', 'class' => 'validate', 'placeholder' => 'placeholder']) !!}
                    {!! Form::label('vat', 'VAT (%)') !!}

                </div>
                <input type="hidden" value="" id="billid">
                <input type="hidden" value="" id="customerid">
            </div>
            <div class="row">
                <div class="input-field col m6 s12">
                    {!! Form::number('total', null, ['id' => 'total', 'step' => 'any','disabled']) !!}

                </div>
                <div class="input-field col m6 s12">
                    <button class="btn cyan waves-effect waves-light right" type="button" id="Updatemodal">Update
                        <i class="material-icons right">send</i>
                    </button>
                </div>


            </div>


        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>


    <div id="SendSms" class="modal">
        <div class="modal-content">


            <div class="row">
                <div class="input-field col m12 s12">
                    {!!Form::textarea('problemmessage',@CommonFx::sentallcustomersms()->problemmessage, array('id'=>'problemmessage','class'=>'materialize-textarea', 'data-length'=>'160','rows' => 4, 'cols' => 54,'required'))!!}
           
                    {!! Form::label('active', 'Sent Message All Active Customer') !!}

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
<div id="SentEmail" class="modal">
        <div class="modal-content">


            <div class="row">
              <div class="input-field col m12 s12">
                    {!!Form::email('email',null, array('id'=>'email','class' => 'validate', 'placeholder' => 'placeholder', 'required'))!!}
           
                    {!! Form::label('email', 'Customer Email *') !!}
                    {!! Form::hidden('id',null, array('id'=>'id')) !!}

                </div>
                <div class="input-field col m12 s12">
                    {!!Form::text('subject',"Hi", array('id'=>'subject','class' => 'validate', 'placeholder' => 'Email Subject'))!!}
                    {!! Form::label('subject', 'Email Subject*') !!}
                  

                </div>
                <div class="input-field col m12 s12">
                    {!!Form::textarea('message',null, array('id'=>'message','class'=>'materialize-textarea', 'data-length'=>'160','rows' => 4, 'cols' => 54,'required'))!!}
           
                    {!! Form::label('message', 'Message *') !!}

                </div>
                

            
                  
                </div>


            </div>

        <div class="modal-footer">
            <button class="btn cyan waves-effect waves-light right" type="button" id="SendEmailToCustomer">Send
                <i class="material-icons right">send</i>
            </button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
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
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.11.3/api/sum().js"></script>
<script src="https://datatables.net/release-datatables/extensions/FixedHeader/js/dataTables.fixedHeader.js"></script>
    <script>
        $( document ).ready(function() {
    $(".sidenav-main").addClass("nav-collapsed");
            $("#main").addClass("main-full");
            $(".sidenav-main").hover(function() {
                $(".sidenav-main").toggleClass("nav-collapsed");

            });

            if ($(window).width() < 992) {
    $(".sidenav-main").removeClass("nav-collapsed");
    $(".sidenav-main").hover(function() {
                $(".sidenav-main").removeClass("nav-collapsed");

            });
}
});

        $(document).ready(function() {
            $(function load_data(allempty=null,collection=null, withoutcollection=null) {
       
        var table = $('#dataTable').DataTable({
          
             fixedHeader: {
             header: false,
        footer: true
    },
          
       paging: false,
                processing: true,
                serverSide: true,
                          
 dom: 'Bfrtip',
        buttons: [
            
		
        {
		extend: 'csv',
            text: 'Excel',
            exportOptions: {
                stripHtml: true,
				columns: ':visible'
            }
        },
        {
		extend: 'pdf',
            text: 'PDF',
            exportOptions: {
                stripHtml: true,
				columns: ':visible'
            }
        },
       
        {
		extend: 'print',
            text: 'Print',
            exportOptions: {
                stripHtml: true,
				columns: ':visible'
            }
        },
		'colvis'
        ],
		columnDefs: [ {
            
        } ], rowCallback: function(row, data, index) {
        if (data.visible == "0") {
            $(row).addClass("danger");
        }
    },
    
                ajax: {
                    // url:"{{ url('admin/pendingcustomerlist') }}",
                    url: "{{ url('admin/customerlist') }}",
                   
                    data: {
                 allempty:allempty,
                  collection:collection,
                    withoutcollection:withoutcollection,
                  
                }
                },

                columns: [
                

                    {
                        data: 'DT_RowIndex',
                        orderable: true,
                        searchable: false,
                        
                    },
                    {
                        data: 'loginid',
                        name: 'loginid',
                    },

                    {
                        data: 'customername',
                        name: 'customername',

                    },
                    {
                        data: 'address',
                      },

                    {
                        data: 'customermobile',
                        name: 'customermobile',
                        orderable: false
                    },
                    {
                        data: 'secretname',
                        name: 'secretname',
                        orderable: false
                    },
                    {
                        data: 'monthlyrent',
                        orderable: false

                    },
                    {
                        data: 'due',
                        orderable: false

                    },
                    {
                        data: 'discount',
                        orderable: false

                    },
                    {
                        data: 'advance',
                        orderable: false

                    },
                    {
                        data: 'addicrg',
                        orderable: false
                    },
                    {
                        data: 'vat',
                        orderable: false

                    },
                    {
                        data: 'total',
                        orderable: false

                    },
                    {
                        data: 'paid',
                        orderable: false

                    },
                    {
                        data: 'duetotal',
                        name: 'duetotal',
                        orderable: true
                    },



                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }

                ],
                "footerCallback": function ( row, data ) {
            var api = this.api(), data;

             $( api.column( 6, {page:'current'} ).footer() ).html('Rent <br>'+ api.column(6, {page:'current'}).data().sum());
             $( api.column( 7, {page:'current'} ).footer() ).html('Due <br>'+ api.column(7, {page:'current'}).data().sum());
             $( api.column( 8, {page:'current'} ).footer() ).html('Discount <br>'+ api.column(8, {page:'current'}).data().sum());
             $( api.column( 9, {page:'current'} ).footer() ).html('Advance <br>'+ api.column(9, {page:'current'}).data().sum());
             $( api.column( 10, {page:'current'} ).footer() ).html('Add <br>'+ api.column(10, {page:'current'}).data().sum());
             $( api.column( 11, {page:'current'} ).footer() ).html('Vat % <br>'+ api.column(11, {page:'current'}).data().sum());
             $( api.column( 12, {page:'current'} ).footer() ).html('Bill Amount <br>'+ api.column(12, {page:'current'}).data().sum());
             $( api.column( 13, {page:'current'} ).footer() ).html('Collection <br> Amount <br>'+ api.column(13, {page:'current'}).data().sum());
             $( api.column( 14, {page:'current'} ).footer() ).html('Total Due <br>'+ api.column(14, {page:'current'}).data().sum());
            
        },
        initComplete: function() {
      $('#Totalselect').text( table.rows( ).count())
   },   
        });
        $('#dataTable_filter').on('keyup change', function(){
            $('#Totalselect').text( table.rows( ).count());
});
        $('#collectionval>input[type="checkbox"]').click(function() {
            if($(this).prop("checked") == true){
               $('#dataTable').DataTable().destroy();
                  load_data(allempty=null,collection='notnull',withoutcollection=null);
                  $('#Totalselect').text( table.rows( ).count());
            }
            else{
             $('#dataTable').DataTable().destroy();
                load_data(allempty=null,collection=null, withoutcollection=null);
                $('#Totalselect').text( table.rows( ).count());
            }
           
            
        });
        
        $('#withoutcollectionval>input[type="checkbox"]').click(function() {
            if($(this).prop("checked") == true){
               $('#dataTable').DataTable().destroy();
                  load_data(allempty=null,collection=null,withoutcollection='notnull');
                  $('#Totalselect').text( table.rows( ).count());
            }
            else{
                $('#dataTable').DataTable().destroy();
                load_data(allempty=null,collection=null, withoutcollection=null);
                $('#Totalselect').text( table.rows( ).count());
            }
           
            
        });

            });
            
      
            //Delete Admin
            $(document).on('click', '#deleteBtn', function() {

                if (!confirm('Sure?')) return;
                $customerid = $(this).attr('rid');
                //console.log($roomid);
                $info_url = url + '/admin/deletecustomer/' + $customerid;
                $.ajax({
                    url: $info_url,
                    method: "DELETE",
                    type: "DELETE",
                    data: {},
                    success: function(data) {
                        if (data) {
                            toastr.warning('customer Inactive');
                            //location.reload();
                            $('#dataTable').DataTable().ajax.reload();

                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            //Delete Admin end
//sent sms
$(document).on('click', '#Sendsmssubmit', function() {
   
if (!confirm('Are You Confirm  ?')) return;
table = $('#dataTable').DataTable().data();
 // console.log(table); 
  for (let i = 0; i <table.length; i++) {
 
$info_url = url + '/admin/sendsmscustomer';
$.ajax({
    url: $info_url,
    method: "post",
    type: "POST",
    data: {
        loginid:table[i]['loginid'],
        smsmessage:$('#problemmessage').val()
    },
   
});
} 

 toastr.info('Request Process');
  $('#SendSms').modal('close');
       
});


//sent sms

            $(document).on('click', '#UpdateBillBtn', function() {

                $billid = $(this).attr('uid');
                //console.log($roomid);
                $info_url = url + '/admin/findbill/' + $billid;
                $.ajax({
                    url: $info_url,
                    method: "get",
                    type: "GET",
                    data: {},
                    success: function(data) {
                        if (data) {
                            //   console.log(data);

                            $("#billid").val(data.info.id);
                            $("#customerid").val(data.info.customer_id);
                            $("#monthlyrent").val(data.info.monthlyrent);
                            $("#addicrg").val(data.info.addicrg);
                            $("#discount").val(data.info.discount);
                            $("#due").val(data.info.due);
                            $("#advance").val(data.info.advance);
                            $("#vat").val(data.info.vat);
                            $("#total").val(data.info.total);
                            $('#UpdateBill').modal('open');
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
            $("#monthlyrent,#due,#addicrg,#discount,#advance,#vat").keyup(function() {

                var total = isNaN((Number($("#monthlyrent").val()) + Number($("#due").val()) + Number($(
                    "#addicrg").val())) - (Number($("#advance").val()) + Number($("#discount")
                    .val()))) ? 0 : ((Number($("#monthlyrent").val()) + (Number($("#due").val()) +
                    Number($("#addicrg").val())) - (Number($("#advance").val()) + Number($(
                        "#discount")
                    .val())))) + ((Number($("#monthlyrent").val()) + Number($("#addicrg").val())) *
                    Number($("#vat").val())) / 100;
                $("#total").val(total);
                console.log(total);
            });
            $(document).on('click', '#Updatemodal', function() {
                if ($("#monthlyrent").val() == '') {

                    alert('Monthly Charge Is Required');
                    $("#monthlyrent").focus();
                    return false;

                }
                if ($("#addicrg").val() == '') {
                    alert('Additional Charge Is Required');
                    $("#addicrg").focus();
                    return false;

                }
                if ($("#discount").val() == '') {
                    alert('discount  Is Required');
                    $("#discount").focus();
                    return false;

                }
                if ($("#due").val() == '') {
                    alert('due  Is Required');
                    $("#due").focus();
                    return false;

                }
                if ($("#advance").val() == '') {
                    alert('advance  Is Required');
                    $("#advance").focus();
                    return false;

                }
                if ($("#vat").val() == '') {
                    alert('vat  Is Required');
                    $("#vat").focus();
                    return false;

                }
                if ($("#total").val() == '') {
                    alert('total  Is Required');
                    $("#total").focus();
                    return false;

                }
                $info_url = url + '/admin/updatebillcustomer';
                $.ajax({
                    url: $info_url,
                    method: "POST",
                    type: "POST",
                    data: {
                        customerid: $("#customerid").val(),
                        billid: $("#billid").val(),
                        monthlyrent: $("#monthlyrent").val(),
                        addicrg: $("#addicrg").val(),
                        due: $("#due").val(),
                        discount: $("#discount").val(),
                        advance: $("#advance").val(),
                        vat: $("#vat").val(),
                        total: $("#total").val(),
                    },
                    success: function(data) {
                        if (data) {
                            toastr.warning('Update Successfully');
                            $('#UpdateBill').modal('close');
                            $('#dataTable').DataTable().ajax.reload();

                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
// admin status active in active


$(document).on('click','.Approved', function(){
      
                //alert(5);
                $statusid = $(this).attr('rid');
                //console.log($statusid);
                $.ajax({
                    type: "post",
                    url:url+'/admin/customerstatus',
                    data: {
                        id:$statusid,
                        action:"allow"
                    },
                    dataType: "json",
                    success: function (d) {
                        toastr.success(d.message);
                        $('#dataTable').DataTable().ajax.reload();
        
                    }
                });
        
            
        });
        
        $(document).on('click','.Sendemail', function(){
      
                        $("#id").val($(this).attr('cid'));
                            $("#email").val($(this).attr('email'));
                            $('#SentEmail').modal('open');

                
        
            
        }); 
        $(document).on('click','#SendEmailToCustomer', function(){
             if ($("#email").val() == '') {
                    alert('Email Address Is Required');
                    $("#email").focus();
                    return false;

                }
                if ($("#message").val() == '') {
                    alert('Message  Is Required');
                    $("#message").focus();
                    return false;

                }
                $.ajax({
                    type: "post",
                    url:url+'/admin/customeremail',
                    data: {
                        id:$("#id").val(),
                        email:$("#email").val(),
                        message:$("#message").val(),
                        subject:$("#subject").val(),
                    },
                    dataType: "json",
                    success: function (d) {
                        toastr.success("email Send Successfully");
                        $("#message").html(null);
                        $("#email").html(null);
                        $("#subject").html(null);
                         $('#SentEmail').modal('close');
        
                    }
                });
        
            
        });
        
        });
    </script>


@endsection
