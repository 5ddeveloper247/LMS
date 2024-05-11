<?php

namespace Modules\Team\Entities;

use App\Traits\Tenantable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class TeamSetting extends Model
{

use Tenantable;

    protected $guarded = ['id'];
    protected $table = 'team_settings';

    public static function boot()
    {
        parent::boot();
        self::created(function ($model) {
            Cache::forget('TeamSetting_'.SaasDomain());
        });
        self::updated(function ($model) {
            Cache::forget('TeamSetting_'.SaasDomain());
        });
        self::deleted(function ($model) {
            Cache::forget('TeamSetting_'.SaasDomain());
        });
    }

    public static function getData()
    {
        return Cache::rememberForever('teamSetting_'.SaasDomain(), function () {
            return TeamSetting::first();
        });
    }
}
