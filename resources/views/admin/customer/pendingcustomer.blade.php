@extends('layouts.adminMaster')
@section('title', 'Pending Customer List')
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
                    <div class="input-field col s12 m9">

                    </div>


                    <div class="col s12 m3 l3 input-field">

                        <a href="{{ url('admin/createcustomer') }}" class="waves-effect waves-light  btn"><i
                                class="material-icons right">gps_fixed</i> Create New Customer</a>
                    </div>

                    <div class="row">
                        <div class="col s12" style="overflow-x: scroll; scrollbar-width: thin;">
                            <table id="dataTable" class="display table table-striped table-bordered nowrap"
                            style="width: 100%; font-size: 12px; font-family: serif;">
                                <thead>
                                    <tr>
                                        <td>SL</td>
                                        <td style="text-align: left !important">ID</td>
                                        <th style="text-align: left !important">Name</th>
                                        <th style="text-align: left !important">Address</th>
                                        <th>Mobile</th>
                                        <th>IP/<br>Username</th>
                                        <th>Monthly <br>Rent</th>
                                        <th>Due</th>
                                        <th>Discount</th>
                                        <th>Advance</th>
                                        <th>Charge</th>
                                        <th>Vat %</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



                                </tbody>
                                <tfoot>
                                    <td>SL</td>
                                    <td>ID</td>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>IP/<br>Username</th>
                                    <th>Monthly <br>Rent</th>
                                    <th>Due</th>
                                    <th>Discount</th>
                                    <th>Advance</th>
                                    <th>Charge</th>
                                    <th>Vat %</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tfoot>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


  


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
         
            $('#dataTable').DataTable({
                fixedHeader: {
             header: false,
        footer: true
    },            paging: false,
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
                     url:"{{ url('admin/pendingcustomerlist') }}",
                   

                },

                columns: [


                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
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
                        name: 'area.areaname',
                        name: 'thana.thana',
                         name: 'district.district',
                         name: 'houseno',
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
                        name: 'monthlyrent',
                        orderable: false
                    },
                    {
                        data: 'due',
                        name: 'due',
                        orderable: false
                    },
                    {
                        data: 'discount',
                        name: 'discount',
                        orderable: false
                    },
                    {
                        data: 'advance',
                        name: 'advance',
                        orderable: false
                    },
                    {
                        data: 'addicrg',
                        name: 'addicrg',
                        orderable: false
                    },
                    {
                        data: 'vat',
                        name: 'vat',
                        orderable: false
                    },
                    {
                        data: 'total',
                        name: 'total',
						 orderable: false

                    },
                   
                              {
                        data: 'status',
                        name: 'status',
                        orderable: false
                    },


                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }

                ]

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
                    Number($(
                        "#addicrg").val())) - (Number($("#advance").val()) + Number($(
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


        $(document).on('click','.Notapproved', function(){
           
                $statusid = $(this).attr('rid');
                $.ajax({
                    type: "post",
                    url:url+'/admin/customerstatus',
                    data: {
                        id:$statusid,
                        action:"deny"
                    },
                    dataType: "json",
                    success: function (d) {
                        toastr.success(d.message);
                        $('#dataTable').DataTable().ajax.reload();
        
                    }
                });
        
         
             }); 


        });
    </script>


@endsection
