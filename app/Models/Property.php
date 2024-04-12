<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;


class Property extends Model
{
    protected $table = "properties";
    protected $fillable = ['type','description','property_id','city_id'];

    public function propertyable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__,'type','property_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
