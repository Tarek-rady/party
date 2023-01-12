<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    // get name translation
    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getLocale()];
    } // end getNameAttribute


    // get Title translation
    public function getTitleAttribute()
    {
        return $this->attributes['title_' . app()->getLocale()];
    } // end getTitleAttribute


    // get Desc translation
    public function getDescAttribute()
    {
        return $this->attributes['desc_' . app()->getLocale()];
    } // end getDescAttribute

    // function get category
    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id')->where('type' , 'category');
    }


    public function sizes()
    {
        return $this->belongsToMany(Size::class , 'product_sizes');
    }

    // function get ingredent
    public function ingredents()
    {
        return $this->hasMany(Ingredent::class , 'product_id');
    }










}
