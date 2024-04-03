<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    protected $table = "houses";
    protected $fillable = ['title','description','price','total_area','covered_area','rooms_number'];

    public function property()
    {
        return $this->hasOne(Property::class);
    }

}
