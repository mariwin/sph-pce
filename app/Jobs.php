<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title'
    ];

    public function industries (){
        return $this->belongsToMany(Industries::class);
    }
}
