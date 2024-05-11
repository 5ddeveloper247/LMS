<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Payment\Entities\StudentProgramPaymentPlans;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class InstallmentReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    //protected $user, $time;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        // $this->user = $user;
        // $this->time = $time;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      Log::info('Installment Reminder Job Executed.');
      $date_today = Carbon::today();
      $date_adddays = $date_today->copy()->addDays(2);

      $users = StudentProgramPaymentPlans::where('pay_status','pay')->whereBetween('sdate',[$date_today,$date_adddays])->get();
      foreach ($users as $user) {
        $shortcodes = array(
          'program' => $user->program->programTitle,
          'amount' => $user->amount,
          'date' => $user->sdate,
        //  'end_date' => $user->endate,
          'link' => url('my-payment-plan-installment/'.$user->id.'?plan_id='.$user->plan_id)
        );
        send_email($user->user(),'Installment_Reminder',$shortcodes);
      }

    }
}
