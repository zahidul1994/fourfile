<?php

namespace App\Http\Controllers\Admin;
use Validator;
use App\Models\Area;
use App\Models\Bill;
use App\Models\Thana;
use App\Models\Customer;
use App\Helpers\CommonFx;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
 use Illuminate\Database\Eloquent\Builder;

class ReportController extends Controller
{
    public function index(){
     
        $pageConfigs = ['pageHeader' => false, 'isFabButton' => false];
           
            return view('admin.report.customerreport')->with('pageConfigs',$pageConfigs);
        }
      
      
        public function findcustomer(Request $request){
          if(! $request->id==null){
          $searchvalue = Customer::with('district','thana','area')->wherestatus(1)->whereadmin_id(Auth::id())->Where('loginid','LIKE','%'.$request->id."%")->first();
          
          if(!empty($searchvalue))
  {
    $bill=Bill::with('collection.admin','collection.payby')->wherecustomer_id($searchvalue->id)->get();
return response()->json([
  'result'=>$searchvalue,
  'bill'=>$bill,
  
  ],200);
  }
          $searchvalue = Customer::with('district','thana','area')->wherestatus(1)->whereadmin_id(Auth::id())->where('customermobile','LIKE','%'.$request->id."%")->first();
          
          if(!empty($searchvalue))
  {
    $bill=Bill::with('collection.admin','collection.payby')->wherecustomer_id($searchvalue->id)->get();
return response()->json([
  'result'=>$searchvalue,
  'bill'=>$bill,
  
  ],200);
  }
  $searchvalue = Customer::with('collection.admin','district','thana','area')->wherestatus(1)->whereadmin_id(Auth::id())->where('customername','LIKE','%'.$request->id."%")->first();
          
          if(!empty($searchvalue))
  {
    $bill=Bill::with('collection.admin','collection.payby')->wherecustomer_id($searchvalue->id)->get();
return response()->json([
  'result'=>$searchvalue,
  'bill'=>$bill,
  
  ],200);
  }
  $searchvalue = Customer::with('district','thana','area')->wherestatus(1)->whereadmin_id(Auth::id())->where('secretname','LIKE','%'.$request->id."%")->first();
          
          if(!empty($searchvalue))
  {
    $bill=Bill::with('collection.admin','collection.payby')->wherecustomer_id($searchvalue->id)->get();
    return response()->json([
      'result'=>$searchvalue,
      'bill'=>$bill,
  ],200);
  }
  }
     else{
      return response()->json([
        'success'=>false
      
      ],204 );
     }
      
        }

      

  
}
