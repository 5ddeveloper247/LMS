<?php

namespace Modules\VirtualClass\Entities;

use App\Traits\Tenantable;
use Illuminate\Support\Str;
use Modules\BBB\Entities\BbbMeeting;
use Modules\Zoom\Entities\ZoomMeeting;
use Illuminate\Database\Eloquent\Model;
use Modules\Jitsi\Entities\JitsiMeeting;
use App\Notifications\GeneralNotification;
use Modules\CourseSetting\Entities\Course;
use Modules\Localization\Entities\Language;
use Illuminate\Support\Facades\Notification;
use Modules\CourseSetting\Entities\Category;
use Modules\Team\Entities\TeamMeeting;
use Modules\StudentSetting\Entities\Program;
use Spatie\Translatable\HasTranslations;

class VirtualClass extends Model
{
    use Tenantable;

    protected $guarded = [];

    use HasTranslations;

    public $translatable = ['title'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault();
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id')->withDefault(
            [
                'name' => ''
            ]
        );
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id')->withDefault();
    }

    public function language()
    {
        return $this->belongsTo(Language::class, 'lang_id')->withDefault();
    }

    public function zoomMeetings()
    {
        return $this->hasMany(ZoomMeeting::class, 'class_id')->orderBy('start_time', 'asc');
    }
    public function teamMeetings()
    {
        return $this->hasMany(TeamMeeting::class, 'class_id')->orderBy('start_time', 'asc');
    }

    public function bbbMeetings()
    {
        return $this->hasMany(BbbMeeting::class, 'class_id')->orderBy('datetime', 'asc');
    }

    public function jitsiMeetings()
    {
        return $this->hasMany(JitsiMeeting::class, 'class_id')->orderBy('datetime', 'asc');
    }

    public function totalClass()
    {
        $total = 0;
        if ($this->host == "Zoom") {
            $total = count($this->zoomMeetings);
        } elseif ($this->host == "BBB") {
            $total = count($this->bbbMeetings);
        } elseif ($this->host == "Jitsi") {
            $total = count($this->jitsiMeetings);
        }
        elseif ($this->host == "Team") {
            $total = count($this->teamMeetings);
        }
        return $total;
    }

    public function course()
    {
        return $this->hasOne(Course::class, 'class_id')->withDefault();
    }

    public function parentcourse()
    {
        return $this->belongsTo(Course::class, 'course_id')->withDefault();
    }
    
    public function paymentPlan(){
        return $this->hasOne(Course::class, 'parent_id');
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->title) == "" ? str_replace(' ', '-', $this->title) : Str::slug($this->title);

    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            saasPlanManagement('meeting', 'create');
        });

        static::deleting(function ($virtualClass) {
            saasPlanManagement('meeting', 'delete');
            $receivers = $virtualClass->course->enrollUsers;
            $message = "Your virtual class " . $virtualClass->title . " has been deleted";
            foreach ($receivers as $key => $receiver) {
                $details = [
                    'title' => 'Virtual Class Deleted ',
                    'body' => $message,
                    'actionText' => '',
                    'actionURL' => '',
                ];
                Notification::send($receiver, new GeneralNotification($details));
            }
        });

    }


}
