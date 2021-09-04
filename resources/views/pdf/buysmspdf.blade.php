<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 {{-- csrf token tag --}}
<meta name="csrf-token"   content="{{csrf_token()}}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    
  </head>
  <body>
      
<div class="container">

          <div class="col-md-9">
            
              <strong class="pull-right">Date:{{@$infos->created_at}}</strong>
              <address>
                
              <strong> Receipt Number  #00{{$infos->id}}</strong> <br>
              <strong>Date: {{ date('M-d-Y', strtotime(@Carbon\Carbon::now())) }} <br>
                  <strong>Name:  {{Auth::user()->name}}</strong><br>
                  <strong>Email:  {{Auth::user()->email}}</strong><br>
                  <strong>Address & phone.   {{Auth::user()->address}} . <br> {{Auth::user()->phone}}</strong>
                   
                  
              </address>  
            
  
          </div>
          <div class="col md-3 text-right">
            <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG(Request::url(), 'QRCODE') }}" />

        </div>
    

      
              <table class="table ">
               
                  <tbody>
                                          
                    <tr>
                        <th data-field="id">Amount</th>
                        <th data-field="name">{{$infos->payamount}}</th>
                        
                    </tr>
                    <tr>
                        <th data-field="id">Pay By</th>
                        <th data-field="name">{{@$infos->payment->paymentname}}</th>
                        
                    </tr>
                    <tr>
                      <th data-field="id">Status</th>
                      <th data-field="name"> @if ($infos->status==0)
                        Peding
                        @else
                        Aproved
                    @endif</th>
                     
                        
                    </tr>

                </tbody>
                    
                  </tr>
                  
                
                  <tfoot>
                    <tr>
                      <td colspan="6"><strong> Authorized Signature</strong></td>
                     
                      
                   
                    </tr>
                  </tfoot>
                </tbody>
              </table>
            
          </div>
<!-- /page content -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>