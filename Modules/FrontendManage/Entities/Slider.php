<?php

namespace Modules\FrontendManage\Entities;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Modules\CourseSetting\Entities\Course;
use Modules\FrontendManage\Entities\FrontPage;

class Slider extends Model
{
    use Tenantable;

    protected $fillable = [];

    public function course()
    {
        return $this->belongsTo(Course::class)->withDefault();
    }
    
    public function page()
    {
        return $this->belongsTo(FrontPage::class, 'page_id');
    }


}
