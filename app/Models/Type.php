<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }
    use HasFactory;
}
