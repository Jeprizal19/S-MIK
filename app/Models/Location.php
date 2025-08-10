<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'description'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function itemLogsFrom()
    {
        return $this->hasMany(ItemLog::class, 'from_location_id');
    }

    public function itemLogsTo()
    {
        return $this->hasMany(ItemLog::class, 'to_location_id');
    }
}
