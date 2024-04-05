<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'restaurant_id', 'delivery_address', 'name', 'surname', 'phone', 'status'];

    // relazioni  con le altre tabelle del database
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function dishes()
    {
        return $this->belongsToMany(Dish::class)->withPivot('quantity');
    }
}
