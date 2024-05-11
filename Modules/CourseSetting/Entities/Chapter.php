<?php

namespace Modules\CourseSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{


    protected $fillable = [];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'chapter_id', 'id')->orderBy('position');
    }
    /**
     * Get all of the course_sale for the Chapter
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function course_check(): HasMany
    {
        return $this->hasMany(CourseSale::class, 'content_id', 'id')->where('content_type', 'chapter');
    }
}
