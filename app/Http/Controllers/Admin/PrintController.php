<?php

namespace App\Http\Controllers\Admin;
use App\Models\Bill;
use App\Models\Printsetting;
use App\Models\Customer;
use App\Helpers\CommonFx;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Notifications\SmsNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Pagination\LengthAwarePaginator;


class PrintController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    
    $printset = Printsetting::firstOrCreate(
      ['admin_id' => Auth::guard('admin')->user()->id],
      [
        'papersetting' => 'oneheadin',
        'singnature' => 'not-found.jpg',
      
    ],


    );
    $pageConfigs = ['pageHeader' => false, 'isFabButton' => false];
    return view('admin.print.index')->with('pageConfigs', $pageConfigs)->with('printset', $printset);
  }

  public function monthly()
  {
   $Bill=Customer::with('bill.collection')->whereadmin_id(Auth::id())->wherestatus(1)->paginate(10);

    return view('admin.print.invoice', ['customers' => $Bill]);
  }
 
  


  public function update(Request $request, $id)
  {
    if ($request->hasfile('photo')) {
      $info=Printsetting::find($id);
   //  dd($info);exit;
      if($info->singnature !=='not-found.jpg'){
         
          $imagepath=(storage_path().'/app/files/shares/singnaturephoto/').$info->singnature;
          $thumbimagepath=(storage_path().'/app/files/shares/singnaturephoto/thumbs/').$info->singnature;
        if(file_exists( $imagepath) && ($thumbimagepath) ){
            unlink($imagepath) && unlink($thumbimagepath);
    
        }
      }
    $name='admin_'.Auth::user()->id.'_'.$request->photo->getClientOriginalName();
     $request->photo->move(storage_path().'/app/files/shares/singnaturephoto/', $name);
   
   $resizedImage_thumb = Image::make(storage_path().'/app/files/shares/singnaturephoto/'.$name)->resize(35, null, function ($constraint) {
       $constraint->aspectRatio();
   });
   
     $resizedImage_thumb->save(storage_path() . '/app/files/shares/singnaturephoto/thumbs/'.$name, 100);
}
else{
 $name =$request->oldphoto;
};
$userinfo = Printsetting::whereadmin_id(Auth::user()->id)->find($id)->update(array(
  'papersetting' => $request->papersetting,
  'customtext' => $request->customtext,
  'singnature' => $name,
 ));
   
      
       Toastr::success("Setting  Update Successfully", "Well Done");
       return Redirect::to('admin/printsetting');
      
      
  }

  public function destroy($id)
  {

    return response(Customer::whereadmin_id(Auth::id())->delete($id));
  }
}
