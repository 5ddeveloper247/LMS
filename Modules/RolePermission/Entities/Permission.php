<?php

namespace Modules\RolePermission\Entities;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Spatie\Translatable\HasTranslations;

class Permission extends Model
{

    protected $guarded = [];

    use HasTranslations;

    public $translatable = ['name'];


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }

    public function assign()
    {
        return $this->hasMany(RolePermission::class, 'role_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany(Permission::class, 'parent_route', 'route')->with('childs');
    }

    public function parent()
    {
        return $this->belongsTo(Permission::class, 'parent_route', 'route');
    }


    public static function boot()
    {
        parent::boot();
        self::created(function ($model) {
            Cache::forget('PermissionList_' . SaasDomain());
            Cache::forget('RoleList_' . SaasDomain());
            Cache::forget('oldPermissionSync' . SaasDomain());
        });
        self::updated(function ($model) {
            Cache::forget('PermissionList_' . SaasDomain());
            Cache::forget('RoleList_' . SaasDomain());
            Cache::forget('PolicyPermissionList_' . SaasDomain());
            Cache::forget('PolicyRoleList_' . SaasDomain());
            Cache::forget('oldPermissionSync' . SaasDomain());
        });
    }

}
