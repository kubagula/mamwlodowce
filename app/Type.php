<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the ingredients for the blog type.
     */
    public function ingredients()
    {
        return $this->hasMany('App\Ingredient');
    }
}
