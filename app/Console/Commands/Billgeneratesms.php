<?php

namespace App\Console\Commands;
use App\Models\Customer;
use App\Helpers\CommonFx;
use Illuminate\Console\Command;

class Billgeneratesms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:billgeneratesms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All Active Member Bill Generate SMS Task';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Customer::with('bill')->wherestatus(1)->chunk(50, function ($users) {
            foreach ($users as $customer) {
         
                $smsinfo=['adminid'=>$customer->admin_id,'name'=>$customer->customername,'mobile'=>$customer->customermobile,'id'=>$customer->loginid,'billamount'=>$customer->bill[0]->total,'expeirydate'=>$customer->atd_month];
        CommonFx::sentsmsbillcreate($smsinfo);   
            }
        });
       

        // Customer::wherestatus(1)->chunk(50, function ($users) {
        //     foreach ($users as $customer) {
         
        //         $smsinfo=['adminid'=>$customer->admin_id,'name'=>$customer->customername,'mobile'=>$customer->customermobile,'id'=>$customer->loginid,'expeirydate'=>$customer->atd_month];
        // CommonFx::newsentsmsbillcreate($smsinfo);   
        //     }
        // });
       
         
        $this->info('Bill  SMS Send Done');
    
    }
}
