@extends('layouts.adminMaster')
@section('title', 'Paymentinfo List')
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



                    <div class="row">
                        <div class="col s12" style="overflow-x: scroll; scrollbar-width: thin;">
                            <table id="dataTable" class="display table table-striped table-bordered nowrap"
                                style="width: 100%;">
                                <thead>

                                    <tr>
                                        <td>SL</td>
                                        <td>Date</td>
                                        <td>ID</td>
                                        <td>Customer</td>
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
           

            $('#dataTable').DataTable({
                // responsive: true,

                processing: true,
                serverSide: true,
                ajax: {
                   
                    url: "{{ url('admin/paybillinfo') }}",

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
                        data: 'customer.loginid',
                        name: 'customer.loginid',

                    }, {
                        data: 'customer.customername',
                        name: 'customer.customername',

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
            $(document).on('click', '.Pending', function() {

                if (!confirm('Are Your Sure Payment Confram?')) return;
                $id = $(this).attr('rid');
                //console.log($roomid);
                $info_url = url + '/admin/conframpayment/' + $id;
                $.ajax({
                    url: $info_url,
                    method: "post",
                    type: "POST",
                    data: {},
                    success: function(data) {
                        if (data) {
                            toastr.info('Payment  Confram Successfully');
                            //location.reload();
                            $('#dataTable').DataTable().ajax.reload();

                        }
                    },
                    error: function(data) {
                        toastr.warning('Bill Allready Paid');
                    }
                });
            });
            
            $(document).on('click', '.Cancel', function() {

                if (!confirm('Are Your Sure Payment Cancel?')) return;
                $id = $(this).attr('rid');
                //console.log($roomid);
                $info_url = url + '/admin/cancelpayment/' + $id;
                $.ajax({
                    url: $info_url,
                    method: "post",
                    type: "POST",
                    data: {},
                    success: function(data) {
                        if (data) {
                            toastr.info('Payment  Cancel Successfully');
                            //location.reload();
                            $('#dataTable').DataTable().ajax.reload();

                        }
                    },
                    error: function(data) {
                        toastr.warning('Bill Cancel Paid');
                    }
                });
            });

           

        
        });
    </script>


@endsection
