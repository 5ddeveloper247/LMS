<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PreRegistration extends Model    
{
   

    protected $table = 'pre-registration';



    protected $fillable = [

        'name', 'email','password','language'

    ];

}