@extends('layouts.customerMaster')
@section('title', 'Complain List')
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
                   <a href="{{url('customer/createcomplain')}}" class="btn ">Create Complain</a>
                    </div>

                    <div class="row">
                        <div class="col s12" style="overflow-x: scroll; scrollbar-width: thin;">
                            <table id="dataTable" class="display table table-striped table-bordered nowrap"
                                style="width: 100%;">
                                <thead>

                                    <tr>
                                        <td>SL</td>
                                        <td>Date</td>
                                        <td>ID</td>
                                        <td>Cutomer <br> Name</td>
                                        <td>Mobile</td>
                                        <td>Complain </td>
                                        <td>Message</td>
                                        <td>Created/ <br> Updated</td>
                                        <td>status</td>
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
                   
                    url: "{{ url('customer/complainlist') }}",

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
                        data: 'customerid',
                        name: 'customerid',

                    },

                    {
                        data: 'name',
                        name: 'name',

                    },

                    {
                        data: 'phone',
                        name: 'phone',

                    }, {
                        data: 'complaintitle',
                        name: 'complaintitle',

                    },{
                        data: 'complainmessage',
                        name: 'complainmessage',

                    },

                    {
                        data: 'adminname',
                        name: 'adminname',

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


        
        });
        });
    </script>


@endsection
