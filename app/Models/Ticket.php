<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    //koloms
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'prioritas',
        'status',
        'assigned_to'
    ];

    public function user() {
        return $table = $this->belongsTo(User::class);
    }

    public function agent() {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
