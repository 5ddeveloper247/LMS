<?php

namespace Modules\Team\Entities;

use App\User;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class TeamMeetingUser extends Model
{

use Tenantable;
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
