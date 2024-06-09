<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
    ];

    protected $appends = [
        'countClassroomSubscribed',
    ];

    public $timestamps = true;

    public function getCountClassroomSubscribedAttribute()
    {
        return Classroom::query()->where('subject_id', $this->id)->count();
    }
}
