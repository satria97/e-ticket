<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function discount()
    {
        return $this->hasMany(Discount::class);
    }
}
