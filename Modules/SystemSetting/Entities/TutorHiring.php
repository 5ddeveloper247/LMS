<?php

namespace Modules\SystemSetting\Entities;


use App\User;
use Illuminate\Database\Eloquent\Model;
use Modules\CourseSetting\Entities\Course;
use Modules\StudentSetting\Entities\TutorReveiws;

class TutorHiring extends Model
{

    protected $table = 'tutor_hirings';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function tutorReviewRating()
    {
        return $this->hasOne(TutorReveiws::class, 'hiring_id', 'id');
    }
}
