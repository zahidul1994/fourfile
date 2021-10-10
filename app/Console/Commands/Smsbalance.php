<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Smssent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Notifications\Adminupdatenotification;

class Smsbalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:smsbalance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sent Notification With Low Balance';

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
        $infos = Smssent::select('id','admin_id','blance')->get();
        // dd($users);
         foreach ($infos as $info) {
            
            if($info->blance<100){
                $data = [
            
                    'admindata' =>'<a class="black-text"  href="'. url('/admin/createbuysms').'"> Your Balance Is '.$info->blance.' TK Please Recharge  </a>',
            ];
            
            Admin::find($info->admin_id)->notify(new Adminupdatenotification($data));
           // Log::info($data);
            }
        
        
        }
       
         $this->info('Notification  Done');
    }
}
