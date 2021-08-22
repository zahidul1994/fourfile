<?php

namespace App\Observers;
use App\Models\Customer;
use App\Helpers\CommonFx;
use App\Models\Bill;
use App\Models\Collection;

class CustomerObserver
{
    /**
     * Handle the Customer "created" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function created(Customer $customer)
    {
        if($customer->status==1){
            Bill::create(
                ['customer_id' => $customer->id,
                 'monthlyrent' => $customer->monthlyrent,
                 'due' => $customer->due,
                 'addicrg' => $customer->addicrg,
                 'discount' => $customer->discount,
                 'advance' => $customer->advance,
                  'vat' => $customer->vat,
                 'total' => $customer->total,
                 'admin_id' => $customer->admin_id,
                 'user_id' => $customer->user_id
              
            ]);
            $smsinfo=['name'=>$customer->customername,'mobile'=>$customer->customermobile,'id'=>$customer->loginid,'monthlypayment'=>$customer->monthlyrent];
            CommonFx::sentsmscustomer($smsinfo);
         }
    }

    /**
     * Handle the Customer "updated" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function updated(Customer $customer)
    {
        
       $check= Bill::wherecustomer_id($customer->id)->first();
        if(!$check){
            Bill::create(
                ['customer_id' => $customer->id,
                'monthlyrent' => $customer->monthlyrent,
                 'due' => $customer->due,
                 'addicrg' => $customer->addicrg,
                 'discount' => $customer->discount,
                 'advance' => $customer->advance,
                  'vat' => $customer->vat,
                 'total' => $customer->total,
                 'admin_id' => $customer->admin_id,
                 'user_id' => $customer->user_id
              
            ]);
            $smsinfo=['name'=>$customer->customername,'mobile'=>$customer->customermobile,'id'=>$customer->loginid,'monthlypayment'=>$customer->monthlyrent];
            CommonFx::sentsmscustomer($smsinfo);
          
        }
    }

    /**
     * Handle the Customer "deleted" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function deleted(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function restored(Customer $customer)
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     *
     * @param  \App\Models\Customer  $customer
     * @return void
     */
    public function forceDeleted(Customer $customer)
    {
        //
    }
}
