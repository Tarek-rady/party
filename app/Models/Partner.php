<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'email' , 'password' , 'lat' ,'lng' ,  'location' , 'mobile' , 'manager' , 'manager_mobile' , 'img' , 'location_img' , 'delivary'];

    // function get services

    public function services()
    {
        return $this->belongsToMany(Service::class , 'partner_services');
    }




}
