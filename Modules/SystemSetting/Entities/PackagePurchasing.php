<?php

namespace Modules\SystemSetting\Entities;


use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\CourseSetting\Entities\Course;
use Modules\StudentSetting\Entities\TutorReveiws;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Modules\SystemSetting\Entities\PackagePurchasing;

class PackagePurchasing extends Model
{

    protected $table = 'package_purchasing';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(PackagePricing::class, 'package_id', 'id');
    }

    public function getLatestPackageBuyAttribute()
    {
        return PackagePurchasing::where('user_id', $this->user_id)->latest()->first();
    }
    // public function userPackagePurchasing()
    // {
    //     return $this->belongsToMany(PackagePurchasing::class, 'package_purchasing');
    // }
    // public function packagePurchasing()
    // {
    //     return $this->hasMany(PackagePurchasing::class, 'package_id', 'id');
    // }
    // public function student()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
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
