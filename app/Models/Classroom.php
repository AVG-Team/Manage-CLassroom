<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'title',
        'description',
        'code_classroom',
        'image_path',
        'status',
        'price',
        'category_id',
    ];

    public $timestamps = true;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'classroom_details', 'classroom_id', 'user_id')
            ->withPivot('status')
            ->withTimestamps();
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'classroom_details', 'classroom_id', 'user_id')
            ->where('role', 2)
            ->withTimestamps();
    }
}
