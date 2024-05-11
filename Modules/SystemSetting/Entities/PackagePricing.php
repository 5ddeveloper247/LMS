<?php

namespace Modules\SystemSetting\Entities;


use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\CourseSetting\Entities\Course;
use Modules\StudentSetting\Entities\TutorReveiws;
use Modules\SystemSetting\Entities\PackagePurchasing;

class PackagePricing extends Model
{

    protected $table = 'package_pricing';
    protected $guarded = [];


    // public function packagePurchasing()
    // {
    //     return $this->hasMany(PackagePurchasing::class, 'package_id', 'id');
    // }
    // public function instructor()
    // {
    //     return $this->belongsTo(User::class, 'instructor_id', 'id');
    // }
    // public function course()
    // {
    //     return $this->belongsTo(Course::class, 'course_id', 'id');
    // }
    // public function tutorReviewRating()
    // {
    //     return $this->hasOne(TutorReveiws::class, 'hiring_id', 'id');
    // }
}
