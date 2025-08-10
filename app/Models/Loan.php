<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'item_id', 'borrower_name', 'borrower_unit',
        'borrow_date', 'return_date', 'status', 'notes'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
