<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
	public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The ingredients that belong to the month.
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }
}
