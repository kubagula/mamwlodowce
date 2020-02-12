<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preservative extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'description', 'category', 'bad'];
}
