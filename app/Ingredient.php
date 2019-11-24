<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The receipes that belong to the ingredient.
     */
    public function recipes()
    {
        return $this->belongsToMany('App\Recipe');
    }

    /**
     * The months that belong to the ingredient.
     */
    public function months()
    {
        return $this->belongsToMany('App\Month');
    }
}
