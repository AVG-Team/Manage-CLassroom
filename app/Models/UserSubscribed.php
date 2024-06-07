<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscribed extends Model
{
    protected $table = 'user_subscribed';
    use HasFactory;

    protected $fillable = [
        'status',
        'classroom_id',
        'user_id',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
