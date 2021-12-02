@extends('layouts.adminMaster')
@section('title', 'Customer Collection Report')
{{-- vendor styles --}}
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/flag-icon/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/data-tables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css') }}">
   
    <link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css" rel="stylesheet">
   
@endsection
{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/data-tables.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <style>

td{
    border: 1px solid #ddd;
    white-space: normal !important;
    padding: 5px !important;
    text-align: center;
}
table.dataTable thead th, table.dataTable thead td{
    padding: 5px !important;
}
th{
    border: 1px solid #ddd;
    padding: 5px !important;
    text-align: left;
}
.card-content{
    padding: 10px !important;
}

table.dataTable thead .sorting{
    background-image: blod;
}
table.dataTable thead .sorting_asc{
    background-image: blod;
}
.sorting-icon{
    display: flex;
    align-items: center;
    
}
.sorting-icon i{
    font-size: 15px !important;
    margin-left: auto
}
table.dataTable tbody td:nth-child(3){
    text-align: left
}
table.dataTable tbody td:nth-child(4){
    text-align: left
}




    </style>
@endsection
@section('content')

    {{-- @can('Customer-Create') --}}

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span style="color: #222; font-size: 14px"   >Total Record <strong id="Totalselect"></strong></span>
                    <div class="input-field col s12 m12 p-0">
                        <form  style="display: flex">
                            <p>
                                <label id="form">Form: </label>
                                  <input type="text"  id="form"  class="datepickerone" />
                                 
                                
                              </p>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              <p>
                                <label id="to">To: </label>
                                  <input type="text"  id="to"  class="datepickertwo" />
                                 
                              </p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              <p>
                                <label id="useri">Select  Employe</label>
                                <select name="userid" id="userid">
                                    <option disable value="">Select One</option>
                                 @foreach (@CommonFx::CompanyEmploye() as $info)
                                    
                                     <option value="{{$info->id}}">{{$info->username}}</option>
                                 @endforeach

                                </select>
                               
                                
                              </p>
                              &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; 
                              <p style="align-self: end; margin-bottom: 5px;">
                               
                                <input type="button"  class="btn" value="Submit" id="submitbutton" />
                                
                              </p>
                           
                          </form>
                    </div>


                   

                    <div class="row">
                        <div class="col s12" style="">
                            <table id="dataTable" class="display"
                            style="width: 100%; font-size: 12px; font-family: serif;">
                                <thead>

                                    <tr>
                                    <th>ID</th>
                                    <th>IP/<br>Username</th>
                                        <th style="text-align: left !important">Name </th>
                                        <th style="text-align: left !important">Address</th>
                                        <th>Total </th>
                                       <th>Collection By</th>
                                      
                                       
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>  
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    <script>


        $(document).ready(function() {
            $('.datepickerone').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
});          
$('.datepickertwo').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss'
});          
            $(function load_data(allempty=null,form=null, to=null,userid=null) {
       
        var table = $('#dataTable').DataTable({
        
            initComplete: function() {
      $('#Totalselect').text( table.rows( ).count())
   },
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
                    
                    url: "{{ url('admin/customercollectionreport') }}",
                   
                    data: {
                 allempty:allempty,
                  form:form,
                    to:to,
                    userid:userid,
                  
                }
                },

                columns: [
                
                    {
                        data: 'loginid',
                        name: 'loginid',
                    },
                    {
                        data: 'secretname',
                        name: 'secretname',
                        orderable: false
                    },
                    {
                        data: 'customername',
                        name: 'customername',

                    },
                    {
                        data: 'address',
                      },

                      {
                        data: 'paid',
                      

                    },
                    
                  
                   
                    {
                        data: 'collectorname',
                          
                     

                    }
                   
                ],
    
               
        });
        $('#dataTable_filter').on('keyup change', function(){
            $('#Totalselect').text( table.rows( ).count());
});
$('#submitbutton').click(function() {
           
           if ($('#userid').find(":selected").val()==null) {
                $('#dataTable').DataTable().destroy();
                load_data(allempty=null,form=$('.datepickerone').val(), to=$('.datepickertwo').val(), userid=null);
            } else {
                $('#dataTable').DataTable().destroy();
             
             load_data(allempty=null,form=$('.datepickerone').val(), to=$('.datepickertwo').val(), userid=$('#userid').find(":selected").val());
            }
        });
        });
        });
    </script>


@endsection
