<?php

namespace Modules\AuthorizeNetPayment\Entities;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class AuthorizeNetSetting extends Model
{
    use Tenantable;

    protected $table = 'AuthorizeNet_Settings';
}
