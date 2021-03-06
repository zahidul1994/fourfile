@extends('layouts.adminMaster')
@section('content')
@section('title', "Hello Admin")
 <div class="section">
  <!--card stats start-->
  <div id="card-stats" class="pt-0">
     <div class="row">
      <div class="col s12 m6 l6 xl3">
           
           <div class="card animate fadeLeft">
            <div class="card-content cyan white-text">
               <p class="card-stats-title"><i class="material-icons">person_outline</i> Total</p>
               <h4 class="card-stats-number white-text">{{@$user->count('id')}}</h4>
               <p class="card-stats-compare">
                  <i class="material-icons">keyboard_arrow_up</i> User
                  <span class="cyan text text-lighten-5"></span>
               </p>
            </div>
           
         </div>
        </div>
        <div class="col s12 m6 l6 xl3">
           
           <div class="card animate fadeLeft">
            <div class="card-content red accent-2  white-text">
               <p class="card-stats-title"><i class="material-icons">sms</i> Balance</p>
               <h4 class="card-stats-number white-text">{{@$smsinfo->blance}} Tk</h4>
               <p class="card-stats-compare">
                  <i class="material-icons">keyboard_arrow_up</i> {{@$smsinfo->smsrate}} Tk  Per SMS
                  <span class="cyan text text-lighten-5"></span>
               </p>
            </div>
           
         </div>
        </div>
      
        <div class="col s12 m6 l6 xl3">
           
         <div class="card animate fadeLeft">
          <div class="card-content orange lighten-1 white-text">
             <p class="card-stats-title"><i class="material-icons">accessibility</i>Active Customer</p>
             <h4 class="card-stats-number white-text">{{@$customer->where('status',1)->count('id')}} </h4>
             <p class="card-stats-compare">
                <i class="material-icons">keyboard_arrow_up</i>Inactive {{@$customer->where('status',2)->count('id')}}
                 Customer<span class="cyan text text-lighten-5"></span>
             </p>
          </div>
         
       </div>
      </div>
      <div class="col s12 m6 l6 xl3">
           
         <div class="card animate fadeLeft">
          <div class="card-content green lighten-1 white-text">
             <p class="card-stats-title"><i class="material-icons">accessibility</i> Complain</p>
             <h4 class="card-stats-number white-text">{{@$complain->count('id')}} </h4>
             <p class="card-stats-compare">
                <i class="material-icons">keyboard_arrow_up</i>Pending {{@$complain->where('status',2)->count('id')}}
                Complain <span class="cyan text text-lighten-5"></span>
             </p>
          </div>
         
       </div>
      </div>
        
     </div>
     <div class="row">
      <div class="col s12 m6 l6 xl3">
           
           <div class="card animate fadeLeft">
            <div class="card-content cyan white-text">
               <p class="card-stats-title"><i class="material-icons">person_outline</i> Bill</p>
               <h4 class="card-stats-number white-text">{{@CommonFx::Totalcustomerinfo()->sum('monthlyrent')}}</h4>
               <p class="card-stats-compare">
                  <i class="material-icons">keyboard_arrow_up</i>This Month
                  <span class="cyan text text-lighten-5"></span>
               </p>
            </div>
           
         </div>
        </div>
        <div class="col s12 m6 l6 xl3">
           
           <div class="card animate fadeLeft">
            <div class="card-content red accent-2  white-text">
               <p class="card-stats-title"><i class="material-icons">sms</i>Collection</p>
               <h4 class="card-stats-number white-text">{{@CommonFx::Totalcustomercollection()->sum('paid')}} Tk</h4>
               <p class="card-stats-compare">
                  <i class="material-icons">keyboard_arrow_up</i>This Month
                  <span class="cyan text text-lighten-5"> </span>
               </p>
            </div>
           
         </div>
        </div>
      
        {{-- <div class="col s12 m6 l6 xl3">
           
         <div class="card animate fadeLeft">
          <div class="card-content orange lighten-1 white-text">
             <p class="card-stats-title"><i class="material-icons">accessibility</i>Active Customer</p>
             <h4 class="card-stats-number white-text">{{@$customer->where('status',1)->count('id')}} </h4>
             <p class="card-stats-compare">
                <i class="material-icons">keyboard_arrow_up</i>Inactive {{@$customer->where('status',2)->count('id')}}
                <span class="cyan text text-lighten-5">Customer</span>
             </p>
          </div>
         
       </div>
      </div>
      <div class="col s12 m6 l6 xl3">
           
         <div class="card animate fadeLeft">
          <div class="card-content green lighten-1 white-text">
             <p class="card-stats-title"><i class="material-icons">accessibility</i> Complain</p>
             <h4 class="card-stats-number white-text">{{@$complain->count('id')}} </h4>
             <p class="card-stats-compare">
                <i class="material-icons">keyboard_arrow_up</i>Pending {{@$complain->where('status',2)->count('id')}}
                <span class="cyan text text-lighten-5">Complain</span>
             </p>
          </div>
         
       </div>
      </div> --}}
        
     </div>
  </div>


 </div><!-- START RIGHT SIDEBAR NAV -->

 
@endsection

@section('page-script')

<script>

$( window ).on("load", function() {
   var smsamount='{{@$smsinfo->blance}}';
   let data=new Date();
   let dateinfo= data.getDate();
   var smsalertinfo= localStorage.getItem("smsalertinfo");
  // console.log(dateinfo);
 if((smsamount<100) && (smsalertinfo != dateinfo)){
   localStorage.clear();
   swal({
    title: "Recharge Now",
    text: "Your Sms Balance Low",
    icon: 'warning',
    dangerMode: true,
    buttons: {
      cancel: 'Buy Now',
      delete: 'Dely'
    }
  }).then(function (willDelete) {
    if (willDelete) {
      swal(" We Will Remember Tomorrow", {
        icon: "success",
      });
      localStorage.setItem("smsalertinfo", dateinfo);

    } else {
      window.location.href = url+'/admin/createbuysms';
    }
  });
 };
  $.ajax({
          type: "post",
          url:url+'/admin/checkprofile',
              
          success: function (data) {
            //console.log(data)
           if(data<100){
          $("#name").val(data);
            $('#dd').html(data);
            $('#ProfileModal').modal('open');
          }
          }
     
      });
  
 
});
</script>


@endsection