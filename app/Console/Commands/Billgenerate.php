<?php

namespace App\Console\Commands;

use App\Models\Customer;
use App\Helpers\CommonFx;
use App\Models\Bill;
use Illuminate\Console\Command;

class Billgenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:billgenerate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All Active Member Bill Generate Task';

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
        $users = Customer::wherestatus(1)->get();
       // dd($users);
        foreach ($users as $customer) {
          $info= Bill::create(['customer_id' => $customer->id,
           'monthlyrent' => $customer->monthlyrent,
           'due' => $customer->due?:0,
           'addicrg' => $customer->addicrg?:0,
           'discount' => $customer->discount?:0,
           'advance' => $customer->advance?:0,
            'vat' => $customer->vat?:0,
           'total' => (($customer->monthlyrent+$customer->due+$customer->addicrg)-($customer->advance+$customer->discount))+((($customer->monthlyrent+$customer->addicrg)*($customer->vat))) / 100,
          
        ]);
        if($info){
            $infos=Customer::find($customer->id);
             $infos->due=0;
            $infos->discount=0;
            $infos->addicrg=0;
            $infos->advance=0;
            $infos->total=((($infos->monthlyrent))+(($infos->monthlyrent)*($infos->vat)) / 100);
            $infos->save();
           }
        
            
        }
         
        $this->info('Bill Generate Done');
    
    }
}
