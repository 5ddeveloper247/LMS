<?php

namespace Modules\FrontendManage\Entities;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Modules\CourseSetting\Entities\Course;
use Illuminate\Support\Str;

class ResourceTab extends Model
{
    use Tenantable;

    protected $table = 'resource_tabs';

    protected $fillable = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = $post->createSlug($post->name);
        });
    }

    private function createSlug($name)
    {
        $slug = Str::slug($name);
        $count = $this->where('slug', 'LIKE', "$slug%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

}
