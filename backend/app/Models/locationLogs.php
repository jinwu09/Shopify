<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locationLogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'location_address'
    ];
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, "id", "transaction_id");
    }
}
