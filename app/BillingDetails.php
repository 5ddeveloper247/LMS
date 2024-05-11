<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    protected $connection = 'mysql';
    protected $table = 'billing_details';
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function countryDetails()
    {
        return $this->belongsTo(Country::class, 'country');
    }

    public function stateDetails()
    {
        return $this->belongsTo(State::class, 'state')->withDefault();
    }

    public function cityDetails()
    {
        return $this->belongsTo(City::class, 'city')->withDefault();
    }
}
