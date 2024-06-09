<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'bonus',
        'status',
        'user_id',
        'payday',
        'default_salary_id',
        'note',
    ];


    protected $appends = ['salary'];

    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function defaultSalary(): BelongsTo
    {
        return $this->belongsTo(DefaultSalary::class);
    }

    public function getSalaryAttribute()
    {
        return $this->defaultSalary->salary;
    }
}
