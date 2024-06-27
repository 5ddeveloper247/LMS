<?php

namespace Modules\FrontendManage\Entities;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Modules\CourseSetting\Entities\Course;

class RequirementSlider extends Model
{
    use Tenantable;

    protected $table = 'requirement_slides';

    protected $fillable = [];

}
