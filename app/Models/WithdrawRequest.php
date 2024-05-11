<?php

namespace App\Models;

use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WithdrawRequest extends Model
{
    use Tenantable;
    protected $table = 'withdraw_requests';


    public function userRequest(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tutor_id', 'id');
    }
}
