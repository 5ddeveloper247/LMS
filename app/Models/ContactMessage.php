<?php

namespace App\Models;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use Tenantable;
    protected $table = 'contact_messages';
}
