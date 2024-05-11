<?php

namespace Modules\CourseSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseExercise extends Model
{


    protected $fillable = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($exercise) {
            $file = $exercise->file;
            $filesize = filesize($file); // bytes
            // $filesize = round($filesize / 1024 / 1024, 1); //MB
            $filesize = round($filesize / 1024, 2); //KB

            $exercise->old_file_size = $filesize;
            $exercise->file_size = $filesize;
            $exercise->save();
            if (isModuleActive('LmsSaas')) {
                saasPlanManagement('upload_limit', 'create', $filesize);
            }
        });
        self::deleting(function ($exercise) {
            saasPlanManagement('upload_limit', 'delete', $exercise->filesize);
        });
    }
    /**
     * Get all of the course_sale for the CourseExercise
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function course_check(): HasMany
    {
        return $this->hasMany(CourseSale::class, 'content_id', 'id')->where('content_type', 'course_file');
    }
}
