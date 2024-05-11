<?php

namespace Modules\CourseSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class CoursePlan extends Model
{
    protected $table = 'payment_plans';
    protected $guarded = [];
    protected $dates = ['sdate', 'edate', 'cdate'];
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'parent_id', 'id');
    }
}
