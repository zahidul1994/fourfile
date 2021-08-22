
@extends('layouts.adminMaster')
@section('title', "Pending Customer List")
{{-- vendor styles --}}
@section('vendor-style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">
@endsection
{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
@endsection
@section('content')

{{-- @can('Customer-Create')  --}}
                
                        <div class="row">
                          <div class="col s12">
                              <div class="card">
                                  <div class="card-content">
                                    <div class="input-field col s12 m9">
                                     
                                  </div>
                                 
                                      
                                      <div class="col s12 m3 l3 input-field">
                                        
                                          <a href="{{url('admin/createcustomer')}}" class="waves-effect waves-light  btn"><i class="material-icons right">gps_fixed</i> Create New</a>
                                      </div>
                                     
                                      <div class="row">
                                          <div class="col s12" style="overflow-x: scroll; scrollbar-width: thin;">
                                            <table id="dataTable" class="display table table-striped table-bordered nowrap" style="width: 100%;">
                                                  <thead>
                                              
                                                      <tr>
                                                         <td>SL</td>
                                                         <td>ID</td>
                                                         <th>Name</th>
                                                         <th>Address</th>
                                                         <th>Mobile</th>
                                                         <th>IP/<br>Username</th>
                                                         <th>Monthly <br>Rent</th>
                                                         <th>Previus <br>Due</th>
                                                         <th>Discount</th>
                                                         <th>Advance</th>
                                                         <th>Add <br>Charge</th>
                                                          <th>Vat</th>
                                                          <th>Bill <br>Amount</th>
                                                          <th>Collection <br>Amount</th>
                                                          <th>Total  <br>Due</th>
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
<script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>
@endsection


@section('page-script')
<script src="{{asset('app-assets/js/scripts/data-tables.js')}}"></script>
<script>
$(document).ready(function () {
 
 
  $('#dataTable').DataTable({
   // responsive: true,
   
            processing: true,
            serverSide: true,
            ajax: {
                // url:"{{url('admin/pendingcustomerlist') }}",
                url:"{{url('admin/customerlist') }}",
               
            },
           
            columns: [

            
            {data: 'DT_RowIndex', orderable: false, searchable: false},
                { data: 'loginid',name: 'loginid', },
              
                {data: 'customername',name: 'customername',

                },
                {
                    data: 'address',
                    name: 'houseno',
                    orderable: false
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

                },
                {
                    data: 'due',
                    name: 'due',

                },
                  {
                    data: 'discount',
                    name: 'discount',

                },
                  {
                    data: 'advance',
                    name: 'advance',

                }, 
                {
                    data: 'addicrg',
                    name: 'addicrg',

                }, 
                {
                    data: 'vat',
                    name: 'vat',

                }, 
                {
                    data: 'billamount',
                    name: 'billamount',

                }, 
                {
                    data: 'collection',
                    name: 'collection',

                }, 
                {
                    data: 'duetotal',
                    name: 'duetotal',
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
         $(document).on('click','#deleteBtn', function(){
             
             if(!confirm('Sure?')) return;
             $customerid = $(this).attr('rid');
             //console.log($roomid);
             $info_url = url + '/admin/deletecustomer/'+$customerid;
             $.ajax({
                 url:$info_url,
                 method: "DELETE",
                 type: "DELETE",
                 data:{
                 },
                 success: function(data){
                     if(data) {
                        toastr.warning('customer delete');
                         //location.reload();
              $('#dataTable').DataTable().ajax.reload();
                
                         }
                 },
                 error:function(data){
                     console.log(data);
                 }
             });
         });
         //Delete Admin end

});
</script>


@endsection