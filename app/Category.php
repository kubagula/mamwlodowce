<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'photo'];

    /**
     * The recipes that belong to the category.
     */
    public function recipes()
    {
        return $this->belongsToMany('App\Recipe');
    }
    /*
    * For slug in URL - instead id will be slug in url
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
