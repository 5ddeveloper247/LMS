<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\VirtualClass\Entities\VirtualClass;
use Modules\CourseSetting\Entities\Course;
use Modules\SystemSetting\Entities\PackagePricing;
use Modules\SystemSetting\Entities\PackagePurchasing;
use Modules\CourseSetting\Entities\CourseEnrolled;
use Carbon\Carbon;
use App\User;

use Illuminate\Support\Facades\Log;

class PackageExpiryHandle implements ShouldQueue
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
        $instructors = User::where('role_id',9)->with('courses')->get();
        foreach($instructors as $instructor){
            $current_package = PackagePurchasing::where('user_id',$instructor->id)->latest()->first();
            if($current_package){
                if($current_package->expiry_date<Carbon::now()){
                    $disable = Course::where('user_id',$instructor->id)->update(['status' => 0]);
                }
            }
        }
    }

}