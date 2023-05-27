<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'status',
        'total'
    ];
    public function locationLogs()
    {
        // return $this->belongsTo(locationLogs::class, 'user_id');
        return $this->hasMany(locationLogs::class);
    }
}
