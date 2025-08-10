<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'code', 'name', 'category_id', 'location_id',
        'condition', 'quantity', 'description', 'image_path', 'created_by'
    ];

    public function category()
    {
        return $this->belongsTo(Categori::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function logs()
    {
        return $this->hasMany(ItemLog::class);
    }

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
