<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

     // get Name translation
     public function getNameAttribute()
     {
         return $this->attributes['name_' . app()->getLocale()];
     } // end getNameAttribute

    //  function get partners
    public function partners()
    {
       return $this->belongsToMany(Partner::class , 'partner_services');
    }




}
