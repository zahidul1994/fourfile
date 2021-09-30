
@extends('layouts.adminMaster')

{{-- page styles --}}
@section('title','Customer Report')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-invoice.css')}}">
@endsection

@section('content')
{{-- @can('Merchant-List') --}}
<section class="invoice-view-wrapper section">
  <div class="row">
  
    <!-- invoice view page -->
    <div class="col xl12 m12 s12">
      <div class="card">
        <div class="card-content invoice-print-area">
         
          <div class="card invoice-action-wrapper ">
            <div class="row">
            <div class="card-content col m4" >
              <form>
                <input placeholder="Customer id/Name/Phone" id="search" type="text" class="search-box validate white search-circle">
              </form>
          </div>
            <div class="col m4">  
              <a href="#" class="btn-block btn btn-light-indigo waves-effect waves-light invoice-print">
                  <span><i class="material-icons">print</i></span>
              </a>
          </div>
          <div class="col m4"> <button id="downloadexcel"  title="Download Invoice As Pdf"  class="btn-block btn btn-light-indigo waves-effect waves-light ">Excel</button></div>
          </div>
          </div>
          
          <!-- invoice address and contact -->
          <div class="row invoice-info">
            <h3 class="invoice-from center " id="collectionid">Customer Information</h3>
            <div class="col m6 s12">
           
              <div class="invoice-address">
                <span>ID</span> 
              </div>
              <div class="invoice-address">
                <span>Name</span>
              </div>
              <div class="invoice-address">
                <span>PPPoE Username</span>
              </div>
              <div class="invoice-address">
                <span>Address</span>
              </div>
            </div>
            <div class="col m6 s12">
              <div class="divider show-on-small hide-on-med-and-up mb-3"></div>
             
              <div class="invoice-address">
                <div id="userid"></div>
               
              </div>
              <div class="invoice-address" id="name">
              
              </div>
              <div class="invoice-address"  id="ppusername">
                
              </div>
              <div class="invoice-address" id="adress">
               
              </div>
              <div class="invoice-address" id="total">
               
              </div>
            </div>
          </div>
          <div class="divider mb-3 mt-3"></div>
          <!-- product details table-->
          <div class="invoice-product-details">
            <table class="striped responsive-table">
              <thead>
                <th>Date</th>
                <th>Monthly <br> Rent</th>
                <th>Additional</th>
                <th>Discount</th>
                <th>Advance</th>
                {{-- <th>SUM</th> --}}
                <th>Vat %</th>
                
                <th>Due</th>
                <th>Paid</th>
                <th>Total</th>
              </thead>
              <tbody id="dd">
             
              </tbody>
            </table>
          </div>
          <!-- invoice subtotal -->
          
      </div>
    </div>
    <!-- invoice action  -->
  
  </div>
</section>
            
      
  <!-- Modal Structure -->

  {{-- @endcan --}}
@endsection

@section('page-script')
<script src="{{asset('app-assets/js/scripts/app-invoice.js')}}"></script>

<script>
  
$(document).ready(function () {
  function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
};
  $('#search').keydown(delay(function (e) {

    $search = $('#search').val();
  $.ajax({
          type: "post",
          url:url+'/admin/customerreportinfo',
          data: {
              id:$search
             
          },
     
          success: function (data) {
           console.log(data.bill);
           $('#userid').html(null);
            $('#name').html(null);
            $('#ppusername').html(null);
            $('#adress').html(null);
           $('#dd').html(null);
           $('#collectionid').html(null);
           $('#collection').removeAttr('value');
           $('#collectionid').append('<input type="hidden" value="' + data.result.id + '" id="collection" />');
           $('#userid').append('<span>' + data.result.loginid + '</span>');
            $('#name').append('<span>' + data.result.customername + '</span>');
            $('#ppusername').append('<span>' + data.result.secretname + '</span>');
            $('#adress').append('<span> House No # '+ data.result.houseno + ', '+ data.result.floor + ', '  + data.result.district.district + ', ' +
                            data.result.thana.thana + ', ' + data.result.area.areaname +
                            ', ' + data.result.customermobile + '</span>');
          $.each(data.bill, function(key, value){
                       // alert(key);
                        $('#dd').append('<tr><td>' + value.created_at + '</td><td>' + value.monthlyrent + '</td><td>' + value.addicrg + '</td><td>' + value.discount + '</td><td>' + value.advance + '</td><td>' + value.vat + '</td><td>' + value.due + '</td><td>' + value.paid + '</td><td>'  +((value.total).toFixed(2)) + '</td></tr>'
                        );
                     
                    });
                   
                
          }
        });
}, 900));

$(document).on('click','#downloadexcel', function(){
if ($("#collection").val() == '') {
                  toastr.warning('Please Type some Text');
                   
                    return false;
              
                }
                window.location.href = url+'/admin/customerreportexcel/'+$("#collection").val();
    

 
});

});
</script>


@endsection