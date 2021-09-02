<?php
namespace App\Http\Controllers\Superadmin;
use App\Models\Admin;
use App\Models\Buysms;
use App\Models\Payment;
use App\Models\Customer;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Models\Smssent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Contracts\DataTable;

class BuysmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        {
            if (request()->ajax()) {
              return datatables()->of(Buysms::with('admin','payment')->latest())
                ->addColumn('action', function ($data) {
                  $button ='<button type="button" id="UpdateBillBtn" uid="' . $data->id . '" class="invoice-action-view btn-sm" title="Update Bill"><i class="material-icons ">update</i></button>'; 
                  $button .= '&nbsp;&nbsp;';
                  $button .= '<a title="Edit Customer" href="/superadmin/editsalesms/' . $data->id . '" class="invoice-action-view"><i class="material-icons">edit</i></a>';
                  $button .= '&nbsp;&nbsp;';
                 $button .= '<button type="button" title="Inactive Customer"  id="deleteBtn" rid="' . $data->id . '" class="invoice-action-view btn-sm "><i class="material-icons ">https</i></button>';
                  return $button;
                })
                ->addColumn('status', function($data){
                  if($data->status==0){
                 $button = '<button type="button" rid="'.$data->id.'" class="btn-sm Approved" title="Update Status"><i class="material-icons">beenhere</i></button>';
                return $button;
            }
            
            else {
                $button = '<button type="button" title="Update Status" class=" btn-sm Notapproved" rid="'.$data->id.'"><i class="material-icons">block</i> </button>';
                return $button;
            }})
            ->addColumn('admin' ,function($data){
                return $data->admin->name;
            })  
                ->addIndexColumn()
                ->rawColumns(['action','admin','status'])
                ->make(true);
            }
            $pageConfigs = ['pageHeader' => false, 'isFabButton' => false];
        
            return view('superadmin.smssale.index')->with('pageConfigs', $pageConfigs);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "superadmin", 'name' => "Home"], ['link' => "superadmin/paymentlist", 'name' => "Blog"], ['name' => "Create"],
        ];
        
        $pageConfigs = ['pageHeader' => true, 'isFabButton' => false];
        $admin=Admin::pluck('name','id');
        $payment=Payment::pluck('paymentname','id');
        return view('superadmin.smssale.create', ['pageConfigs' => $pageConfigs], ['breadcrumbs' => $breadcrumbs])->with('admins',$admin)->with('payment',$payment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'admin_id' => 'required',
            'payment_id' => 'required',
            'payamount' => 'required',
            ]);
    
           $info= Buysms::create($request->all());
                if($info){
                    $buy=Smssent::whereadmin_id($request->admin_id)->first();
                    $buy->blance +=trim($request->payamount);
                    $buy->save();
                }
                if($buy){
                    Toastr::info("Buysms Create Successfully", "Done");
                    return Redirect::to('superadmin/salesmslist'); 
                }
                   else{
                    Toastr::warning("Buysms Create Fail ", "Sorry");
                    return Redirect::to('superadmin/salesmslist'); 
                   }     
                   
                    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buysms  $buysms
     * @return \Illuminate\Http\Response
     */
    public function show(Buysms $buysms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buysms  $buysms
     * @return \Illuminate\Http\Response
     */
    public function edit(Buysms $buysms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buysms  $buysms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buysms $buysms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buysms  $buysms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buysms $buysms)
    {
        //
    }
}
