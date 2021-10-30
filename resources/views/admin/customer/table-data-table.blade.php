{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Data Table')

{{-- vendor styles --}}
@section('vendor-style')
<link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
@endsection

{{-- page style --}}
@section('page-style')
{{-- <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}"> --}}
@endsection

{{-- page content --}}
@section('content')
<div class="section section-data-tables">
 
  <!-- DataTables example -->
 

  <!-- Page Length Options -->
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title">Page Length Options</h4>
          <div class="row">
            <div class="col s12">
              <table id="page-length-option" class="display">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </thead>
               <tbody>

               </tbody>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection

{{-- vendor scripts --}}
@section('vendor-script')
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js "></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js "></script>
@endsection

{{-- page script --}}
@section('page-script')
{{-- <script src="{{asset('app-assets/js/scripts/data-tables.js')}}"></script> --}}
<script>

$('#page-length-option').DataTable({
  paging: true,
    searching: false,
  processing: true,
 serverSide: true,
           
 dom: 'Bfrtip',
        buttons: [
            
		 {
		extend: 'print',
            text: 'print',
            exportOptions: {
                stripHtml: false,
				columns: ':visible'
            }
        },
		'colvis'
        ],
		columnDefs: [ {
            
        } ],
            ajax: {
                    // url:"{{ url('admin/pendingcustomerlist') }}",
                    url: "{{ url('admin/customerlist') }}",

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
                        data: 'totalmonthlyrent',
                        name: 'totalmonthlyrent',

                    },
                    {
                        data: 'totaldue',
                        name: 'totaldue',

                    },
                    {
                        data: 'totaldiscount',
                        name: 'totaldiscount',

                    },
                    {
                        data: 'totaladvance',
                        name: 'totaladvance',

                    },
                    {
                        data: 'totaladdicrg',
                        name: 'totaladdicrg',

                    },
                    {
                        data: 'totalvat',
                        name: 'totalvat',

                    },
                    {
                        data: 'totalbillamount',
                        name: 'totalbillamount',

                    },
                    {
                        data: 'totalcollection',
                        name: 'totalcollection',

                    },
                    {
                        data: 'duetotal',
                        name: 'duetotal',
                        orderable: false
                    },
//  {
//                         data: 'status',
//                         name: 'status',
//                         orderable: false
//                     },


                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }

                ]

  
    
  });

</script>
@endsection