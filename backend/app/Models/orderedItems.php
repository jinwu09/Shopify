<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderedItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'user_id',
        'quantity',
    ];
    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
}
