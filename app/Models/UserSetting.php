<?php

namespace App\Models;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserSetting extends Model
{
    use Tenantable;
    protected $table = 'user_settings';

    public function user(){
      return $this->belongsTo(User::class, 'user')->withDefault();
    }
}
