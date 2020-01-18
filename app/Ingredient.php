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
    protected $fillable = ['name', 'type_id', 'onhome'];

    /**
     * The receipes that belong to the ingredient.
     */
    public function recipes()
    {
        return $this->belongsToMany('App\Recipe')->withPivot('unit_id', 'value');
    }

    /**
     * The months that belong to the ingredient.
     */
    public function months()
    {
        return $this->belongsToMany('App\Month');
    }

    /**
     * Get the type that owns the ingredient.
     */
    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
