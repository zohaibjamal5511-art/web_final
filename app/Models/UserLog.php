<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'action',
        'seconds_spent',
    ];

    /**
     * Get the user associated with this activity log record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}