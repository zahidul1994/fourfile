<?php

namespace App\Console\Commands;
use App\Models\Bill;
use App\Models\Customer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
class Billcalculation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:billcalculation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Customer Calculation';

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
        $users = Customer::wherestatus(1)->select('id','status')->get();
        // dd($users);
         foreach ($users as $customer) {
             $info=Bill::wherecustomer_id($customer->id)->find(757);
            //  $info=Bill::wherecustomer_id($customer->id)->latest()->first();
            if($info){
                if($info->total<$info->paid){
                    $due=0;
                    $advance=$info->paid-$info->total;
                     Log::info('boro');
                }
                if($info->paid>$info->total){
                    $due=$info->total-$info->paid;
                    $advance=0;
                    Log::info('coto');
                }
               $in=Customer::find($customer->id);
               $in->due += $due;
               $in->advance += $advance;
               $in->total =($in->total+$due)-$advance;
               $in->save();
            }
        
        
        }
          
         $this->info('Bill Calculation  Done');
    }
}
