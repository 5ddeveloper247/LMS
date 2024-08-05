<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\VirtualClass\Entities\VirtualClass;
use Modules\Zoom\Entities\ZoomMeeting;
use Modules\Team\Entities\TeamMeeting;
use Modules\CourseSetting\Entities\CourseEnrolled;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ClassReminder implements ShouldQueue
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
      Log::info('Class Reminder Job executed');
      $date_today = Carbon::today();
    //  $date_adddays = $date_today->copy()->addDays(2);
      $weekday = $date_today->isoFormat('ddd');
      $classes_today = VirtualClass::where('start_date','<=',$date_today)
      ->where('end_date','>=',$date_today)
      ->where('class_day',$weekday)
      ->get();
      foreach ($classes_today as $class) {
        $meeting = TeamMeeting::where('date_of_meeting',$date_today->format('m/d/Y'))->where('class_id',$class->id)->first();
        if($meeting){
          $shortcodes = array(
            'course' => $class->course->slug,
            'date' => $meeting->date_of_meeting,
            'stime' => $class->time,
            'etime' => $class->end_time,
          //  'end_date' => $user->endate,
            'link' => route('classStart', [$class->course->slug, 'Zoom', $meeting->id])
        //    'link' => url('my-payment-plan-installment/'.$user->id.'?plan_id='.$user->plan_id)
          );
          $enrolled_users = CourseEnrolled::where('course_id',$class->course_id)->get();
          foreach ($enrolled_users as $enroll) {
            # code...
            send_email($enroll->user,'Class_Reminder',$shortcodes);
          }
        }
      }

    }
}
