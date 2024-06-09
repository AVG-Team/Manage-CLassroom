<?php

namespace App\Models;

use App\Traits\FullTextSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory, softDeletes, FullTextSearch;

    protected $fillable = [
        'title',
        'description',
        'code_classroom',
        'image_path',
        'status',
        'price',
        'subject_id',
        'grade',
        'capacity',
        'teacher_id',
    ];

    public $timestamps = true;

    protected $searchable = [
        'title',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_subscribed', 'classroom_id', 'user_id')
            ->withPivot('status')
            ->withTimestamps();
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id', 'uuid');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
