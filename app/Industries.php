<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industries extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name'
    ];

    public function jobs (){
        return $this->belongsToMany(Jobs::class);
    }
}
