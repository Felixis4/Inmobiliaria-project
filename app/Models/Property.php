<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Property extends Model
{
    use HasFactory;

    protected $table = "properties";
    protected $fillable = ['type','description','house_id'];

    public function house()
    {
        return $this->belongsTo(House::class, 'house_id');
    }
}


